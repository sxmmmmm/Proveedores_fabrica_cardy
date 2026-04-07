<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('materias_primas', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('tipo');
        $table->string('color')->nullable();
        $table->integer('stock');
        $table->decimal('precio', 10, 2);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materia_primas');
    }
};
