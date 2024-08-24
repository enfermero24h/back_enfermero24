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
            Schema::create('pagos_trabajadores', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('usuario_id');
                $table->decimal('monto', 10, 2);
                $table->unsignedBigInteger('estado_id');
                $table->unsignedBigInteger('pasarela_id');
                $table->string('referencia')->nullable();
                $table->timestamps();
    
                $table->foreign('usuario_id')->references('id')->on('usuarios');
                $table->foreign('estado_id')->references('id')->on('estados');
                $table->foreign('pasarela_id')->references('id')->on('pasarelas');
            });
        }
    
        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('pagos_trabajadores');
        }
    }
    