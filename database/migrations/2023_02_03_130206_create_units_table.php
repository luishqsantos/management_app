<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('unity', 5); //cm, mm, kg
            $table->string('description', 30);
            $table->timestamps();
        });


        //Adicionar o relacionamento com a tabela product_details
        Schema::table('product_details', function (Blueprint $table) {
            $table->unsignedBigInteger('unity_id')->after('weight');

            //linkando a chave esrangeira com o id da tabela
            $table->foreign('unity_id')->references('id')->on('units');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Remover o relacionamento com a tabela product_details
        Schema::table('product_details', function (Blueprint $table) {
            //Remover a fk
            $table->dropForeign('product_details_unity_id_foreign');

            //Remover a coluna
            $table->dropColumn('unity_id');
        });


        Schema::dropIfExists('units');
    }
}
