<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Agregar user_id a entradas_materia_prima
        Schema::table('entradas_materia_prima', function (Blueprint $table) {
            $table->foreignId('user_id')
                  ->nullable()
                  ->after('observacion')
                  ->constrained('users')
                  ->nullOnDelete();
        });

        // Agregar user_id a salidas_materia_prima
        Schema::table('salidas_materia_prima', function (Blueprint $table) {
            $table->foreignId('user_id')
                  ->nullable()
                  ->after('observacion')
                  ->constrained('users')
                  ->nullOnDelete();
        });

        // Agregar user_id a salidas_productos
        Schema::table('salidas_productos', function (Blueprint $table) {
            $table->foreignId('user_id')
                  ->nullable()
                  ->after('observacion')
                  ->constrained('users')
                  ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('entradas_materia_prima', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::table('salidas_materia_prima', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::table('salidas_productos', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
