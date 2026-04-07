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
    Schema::table('materias_primas', function (Blueprint $table) {
        $table->foreignId('empleado_id')->nullable()->constrained();
    });
}

    /**
     * Reverse the migrations.
     */
public function down()
{
    Schema::table('materias_primas', function (Blueprint $table) {
        $table->dropColumn('empleado_id');
    });
}
};
