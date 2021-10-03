<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_facturas', function (Blueprint $table) {
            $table->id();
            $table->string('factura_inicial',);
            $table->string('factura_final');
            $table->string('cai', 100);
            $table->string('factura_actual');
            
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
 
        Schema::dropIfExists('admin_facturas');
 
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
