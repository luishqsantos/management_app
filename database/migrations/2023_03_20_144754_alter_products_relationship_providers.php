<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductsRelationshipProviders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Cria a coluna na tabela products que recebe a fk de fornecedores
        Schema::table('products', function (Blueprint $table)
        {
            $table->unsignedBigInteger('provider_id')->after('id');
            $table->foreign('provider_id')->references('id')->on('providers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_provider_id_foreign');
            $table->dropColumn('provider_id');
        });
    }
}
