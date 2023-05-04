<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->float('length', 8, 2);
            $table->float('height', 8, 2);
            $table->float('width', 8, 2);
            $table->float('weight', 8, 2);
            $table->timestamps();

            //Implementação chave estrangeira
            $table->foreign('product_id')->references('id')->on('products');

            //relacionamento 1 para 1
            $table->unique('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_details');
    }
}
