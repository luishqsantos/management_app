<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //Criando tabela product_stocks
        Schema::create('product_stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->decimal('sale_price', 8, 2)->default(0.01);
            $table->unsignedInteger('quantity')->default(0);
            $table->decimal('total', 8, 2)->default(0.01);
            $table->integer('min_stock')->default(1);
            $table->integer('max_stock')->default(1);
            $table->timestamps();

            //FKs
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_stocks');

    }
}
