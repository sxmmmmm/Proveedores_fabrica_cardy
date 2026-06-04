<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException as ExcelValidationException;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Producto;
use App\Models\MateriaPrima;
use App\Models\Cliente;
use App\Models\Proveedor;
use App\Models\Empleado;

use App\Imports\ProductosImport;
use App\Imports\MateriasPrimasImport;
use App\Imports\ClientesImport;
use App\Imports\ProveedoresImport;
use App\Imports\EmpleadosImport;

use App\Exports\ProductosExport;
use App\Exports\MateriasPrimasExport;
use App\Exports\ClientesExport;
use App\Exports\ProveedoresExport;
use App\Exports\EmpleadosExport;

use App\Mail\ImportacionExitosaMail;
use App\Mail\StockBajoMail;
use Illuminate\Support\Facades\Mail;

class ImportExportController extends Controller
{
    // ──────────────────────────────────────────────────────────────────────────
    // HELPER: procesa el import, captura fallos y notifica si corresponde
    // ──────────────────────────────────────────────────────────────────────────

    /**
     * Ejecuta la importación y devuelve una redirección con éxito o errores.
     *
     * @param  mixed   $import       Instancia del Import (usa SkipsFailures)
     * @param  \Illuminate\Http\UploadedFile  $file
     * @param  string  $entidad      Nombre legible (ej. "Productos")
     * @param  string  $stockCheck   Modelo a revisar para alertas de stock (o null)
     * @return \Illuminate\Http\RedirectResponse
     */
    private function runImport($import, $file, string $entidad, ?string $modelClass = null)
    {
        try {
            Excel::import($import, $file);
        } catch (ExcelValidationException $e) {
            // Error de validación global (cabeceras faltantes, etc.)
            $messages = collect($e->failures())->map(fn($f) =>
                "Fila {$f->row()}: " . implode(', ', $f->errors())
            )->all();

            return back()
                ->withErrors(['import_errors' => $messages])
                ->with('import_modal', true);
        }

        // Fallos de fila recogidos con SkipsFailures
        $failures = $import->failures();

        if ($failures->isNotEmpty()) {
            $messages = $failures->map(fn($f) =>
                "Fila {$f->row()} — " . implode(' | ', $f->errors())
            )->values()->all();

            return back()
                ->withErrors(['import_errors' => $messages])
                ->with('import_modal', true);
        }

        // Importación exitosa: enviar correo al usuario autenticado
        $user = auth()->user();
        if ($user && $user->email) {
            try {
                Mail::to($user->email)->send(new ImportacionExitosaMail($entidad, $user->name ?? 'Usuario'));
            } catch (\Throwable $e) {
                // No bloquear la importación si el correo falla
                \Log::warning("No se pudo enviar correo de importación: " . $e->getMessage());
            }
        }

        // Verificar stock bajo si aplica
        if ($modelClass) {
            $this->checkStockBajo($modelClass, $entidad);
        }

        return back()->with('success', "{$entidad} importados correctamente.");
    }

    /**
     * Revisa ítems con stock ≤ 5 y envía alerta al administrador.
     */
    private function checkStockBajo(string $modelClass, string $entidad): void
    {
        try {
            $items = $modelClass::where('stock', '<=', 5)->get();
            if ($items->isNotEmpty()) {
                $admin = \App\Models\User::whereHas('role', fn($q) => $q->where('name', 'Administrador'))
                    ->first();
                if ($admin && $admin->email) {
                    Mail::to($admin->email)->send(new StockBajoMail($entidad, $items));
                }
            }
        } catch (\Throwable $e) {
            \Log::warning("No se pudo enviar correo de stock bajo: " . $e->getMessage());
        }
    }

    // ==================== PRODUCTOS ====================

    public function importProductos(Request $request)
    {
        $request->validate(['archivo' => 'required|file|mimes:xlsx,xls,csv']);
        return $this->runImport(new ProductosImport, $request->file('archivo'), 'Productos', Producto::class);
    }

    public function exportProductosExcel(Request $request)
    {
        $filters = $request->only(['search', 'stock_min', 'precio_max', 'materia_prima_id']);
        return Excel::download(new ProductosExport($filters), 'productos.xlsx');
    }

    public function exportProductosCsv(Request $request)
    {
        $filters = $request->only(['search', 'stock_min', 'precio_max', 'materia_prima_id']);
        return Excel::download(new ProductosExport($filters), 'productos.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function exportProductosPdf(Request $request)
    {
        $filters   = $request->only(['search', 'stock_min', 'precio_max', 'materia_prima_id']);
        $query     = Producto::with('materiaPrima');
        $this->applyProductoFilters($query, $filters);
        $productos = $query->orderBy('nombre')->get();
        $pdf = Pdf::loadView('pdf.productos-pdf', compact('productos'))->setPaper('a4', 'landscape');
        return $pdf->download('productos.pdf');
    }

    private function applyProductoFilters($query, array $filters): void
    {
        if (!empty($filters['search'])) {
            $s = $filters['search'];
            $query->where(fn($q) => $q->where('nombre', 'like', "%{$s}%")->orWhere('descripcion', 'like', "%{$s}%"));
        }
        if (!empty($filters['stock_min']))        $query->where('stock', '>=', $filters['stock_min']);
        if (!empty($filters['precio_max']))       $query->where('precio', '<=', $filters['precio_max']);
        if (!empty($filters['materia_prima_id'])) $query->where('materia_prima_id', $filters['materia_prima_id']);
    }

    // ==================== MATERIAS PRIMAS ====================

    public function importMateriasPrimas(Request $request)
    {
        $request->validate(['archivo' => 'required|file|mimes:xlsx,xls,csv']);
        return $this->runImport(new MateriasPrimasImport, $request->file('archivo'), 'Materias Primas', MateriaPrima::class);
    }

    public function exportMateriasPrimasExcel(Request $request)
    {
        $filters = $request->only(['search', 'tipo', 'color']);
        return Excel::download(new MateriasPrimasExport($filters), 'materias_primas.xlsx');
    }

    public function exportMateriasPrimasCsv(Request $request)
    {
        $filters = $request->only(['search', 'tipo', 'color']);
        return Excel::download(new MateriasPrimasExport($filters), 'materias_primas.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function exportMateriasPrimasPdf(Request $request)
    {
        $filters = $request->only(['search', 'tipo', 'color']);
        $query   = MateriaPrima::query();
        if (!empty($filters['search'])) {
            $s = $filters['search'];
            $query->where(fn($q) => $q->where('nombre', 'like', "%{$s}%")->orWhere('tipo', 'like', "%{$s}%")->orWhere('color', 'like', "%{$s}%"));
        }
        if (!empty($filters['tipo']))  $query->where('tipo', $filters['tipo']);
        if (!empty($filters['color'])) $query->where('color', $filters['color']);
        $materias = $query->orderBy('nombre')->get();
        $pdf = Pdf::loadView('pdf.materias-primas-pdf', compact('materias'))->setPaper('a4', 'landscape');
        return $pdf->download('materias_primas.pdf');
    }

    // ==================== CLIENTES ====================

    public function importClientes(Request $request)
    {
        $request->validate(['archivo' => 'required|file|mimes:xlsx,xls,csv']);
        return $this->runImport(new ClientesImport, $request->file('archivo'), 'Clientes');
    }

    public function exportClientesExcel(Request $request)
    {
        $filters = $request->only(['search', 'ciudad']);
        return Excel::download(new ClientesExport($filters), 'clientes.xlsx');
    }

    public function exportClientesCsv(Request $request)
    {
        $filters = $request->only(['search', 'ciudad']);
        return Excel::download(new ClientesExport($filters), 'clientes.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function exportClientesPdf(Request $request)
    {
        $filters  = $request->only(['search', 'ciudad']);
        $query    = Cliente::query();
        if (!empty($filters['search'])) {
            $s = $filters['search'];
            $query->where(fn($q) => $q->where('nombre', 'like', "%{$s}%")->orWhere('documento', 'like', "%{$s}%")->orWhere('correo', 'like', "%{$s}%"));
        }
        if (!empty($filters['ciudad'])) $query->where('ciudad', $filters['ciudad']);
        $clientes = $query->orderBy('nombre')->get();
        $pdf = Pdf::loadView('pdf.clientes-pdf', compact('clientes'))->setPaper('a4', 'landscape');
        return $pdf->download('clientes.pdf');
    }

    // ==================== PROVEEDORES ====================

    public function importProveedores(Request $request)
    {
        $request->validate(['archivo' => 'required|file|mimes:xlsx,xls,csv']);
        return $this->runImport(new ProveedoresImport, $request->file('archivo'), 'Proveedores');
    }

    public function exportProveedoresExcel(Request $request)
    {
        $filters = $request->only(['search', 'ciudad', 'mercancia']);
        return Excel::download(new ProveedoresExport($filters), 'proveedores.xlsx');
    }

    public function exportProveedoresCsv(Request $request)
    {
        $filters = $request->only(['search', 'ciudad', 'mercancia']);
        return Excel::download(new ProveedoresExport($filters), 'proveedores.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function exportProveedoresPdf(Request $request)
    {
        $filters     = $request->only(['search', 'ciudad', 'mercancia']);
        $query       = Proveedor::query();
        if (!empty($filters['search'])) {
            $s = $filters['search'];
            $query->where(fn($q) => $q->where('nombre', 'like', "%{$s}%")->orWhere('empresa', 'like', "%{$s}%")->orWhere('documento', 'like', "%{$s}%")->orWhere('correo', 'like', "%{$s}%"));
        }
        if (!empty($filters['ciudad']))    $query->where('ciudad', $filters['ciudad']);
        if (!empty($filters['mercancia'])) $query->where('mercancia', $filters['mercancia']);
        $proveedores = $query->orderBy('nombre')->get();
        $pdf = Pdf::loadView('pdf.proveedores-pdf', compact('proveedores'))->setPaper('a4', 'landscape');
        return $pdf->download('proveedores.pdf');
    }

    // ==================== EMPLEADOS ====================

    public function importEmpleados(Request $request)
    {
        $request->validate(['archivo' => 'required|file|mimes:xlsx,xls,csv']);
        return $this->runImport(new EmpleadosImport, $request->file('archivo'), 'Empleados');
    }

    public function exportEmpleadosExcel(Request $request)
    {
        $filters = $request->only(['search', 'cargo', 'ciudad']);
        return Excel::download(new EmpleadosExport($filters), 'empleados.xlsx');
    }

    public function exportEmpleadosCsv(Request $request)
    {
        $filters = $request->only(['search', 'cargo', 'ciudad']);
        return Excel::download(new EmpleadosExport($filters), 'empleados.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function exportEmpleadosPdf(Request $request)
    {
        $filters   = $request->only(['search', 'cargo', 'ciudad']);
        $query     = Empleado::query();
        if (!empty($filters['search'])) {
            $s = $filters['search'];
            $query->where(fn($q) => $q->where('nombre', 'like', "%{$s}%")->orWhere('documento', 'like', "%{$s}%")->orWhere('correo', 'like', "%{$s}%"));
        }
        if (!empty($filters['cargo']))  $query->where('cargo', $filters['cargo']);
        if (!empty($filters['ciudad'])) $query->where('ciudad', $filters['ciudad']);
        $empleados = $query->orderBy('nombre')->get();
        $pdf = Pdf::loadView('pdf.empleados-pdf', compact('empleados'))->setPaper('a4', 'landscape');
        return $pdf->download('empleados.pdf');
    }
}
