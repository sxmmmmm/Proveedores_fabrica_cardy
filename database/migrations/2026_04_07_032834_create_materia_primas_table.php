<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('materia_primas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('tipo');
            $table->string('color');
            $table->integer('stock');
            $table->decimal('precio', 10, 2);

            // EMPLEADO CORRECTO
            $table->unsignedBigInteger('empleado_id')->nullable();

            $table->foreign('empleado_id')
                  ->references('id')
                  ->on('empleados')
                  ->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materia_primas');
    }
};