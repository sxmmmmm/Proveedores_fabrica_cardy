<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->string('documento')->unique()->after('nombre');
            $table->string('telefono')->nullable()->after('documento');
            $table->string('correo')->unique()->nullable()->after('telefono');
            $table->string('ciudad')->nullable()->after('correo');
            $table->string('direccion')->nullable()->after('ciudad');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->dropUnique('empleados_documento_unique');
            $table->dropUnique('empleados_correo_unique');
            $table->dropColumn('documento', 'telefono', 'correo', 'ciudad', 'direccion');
        });
    }
};
