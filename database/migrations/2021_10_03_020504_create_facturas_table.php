<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('factura_actual');
            $table->foreignId('id_cliente');  
           // $table->foreignId('identidad');
          //  $table->foreignId('id_servicio');
            $table->foreignId('id_usuario');
            $table->float('subtotal', 7, 2);
            $table->float('impuesto', 7, 2);
            $table->float('mora', 7, 2);
            $table->float('total', 7, 2);
            $table->enum('estado_fact', ['activo', 'anulada']);
            
            $table->foreign('factura_actual')
                ->references('id')->on('admin_facturas');

            $table->foreign('id_cliente')
                ->references('id')->on('clientes');
            
            //$table->foreign('identidad')
              //  ->references('identidad')->on('clientes');

            $table->foreign('id_usuario')
                ->references('id')->on('users');

            

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
 
        Schema::dropIfExists('facturas');
 
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
