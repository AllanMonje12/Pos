<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('identification', 100);
            $table->string('nombre_completo');
            $table->foreignId('id_servicio');
            $table->string('ip');
            $table->enum('estado', ['activo', 'inactivo']);
            
            $table->foreign('id_servicio')
                ->references('id')->on('servicios');


            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Schema::dropIfExists('clientes');

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
