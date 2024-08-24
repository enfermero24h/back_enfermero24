<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('oferta_id');
            $table->unsignedBigInteger('servicio_id');
            $table->unsignedBigInteger('estado_id');
            $table->timestamps();

            $table->foreign('oferta_id')->references('id')->on('ofertas');
            $table->foreign('servicio_id')->references('id')->on('servicios');
            $table->foreign('estado_id')->references('id')->on('estados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
}
