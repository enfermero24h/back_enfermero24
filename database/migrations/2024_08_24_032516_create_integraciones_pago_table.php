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
        Schema::create('integraciones_pago', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->enum('tipo', ['mercado_pago', 'pse', 'otro']);
            $table->json('configuracion')->nullable();
            $table->unsignedBigInteger('estado_id');
            $table->timestamps();

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
        Schema::dropIfExists('integraciones_pago');
    }
}