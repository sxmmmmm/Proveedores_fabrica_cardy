<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('entradas_materia_prima', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materia_prima_id')->constrained('materia_primas')->onDelete('cascade');
            $table->integer('cantidad');
            $table->date('fecha');
            $table->string('usuario_nombre'); // manual por ahora
            $table->text('observacion')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('entradas_materia_prima');
    }
};