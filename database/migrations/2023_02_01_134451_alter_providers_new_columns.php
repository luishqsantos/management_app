<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProvidersNewColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('providers', function (Blueprint $table) {
            $table->string('email', 50)->after('name');
            $table->string('uf', 2)->after('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('providers', function (Blueprint $table) {
            $table->dropColumn(['uf', 'email']);
        });
    }
}
