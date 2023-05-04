<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableSiteContactAddFkReason extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('reason_id');
        });

        DB::statement('update site_contacts set reason_id = reason');


        Schema::table('site_contacts', function (Blueprint $table) {
            $table->foreign('reason_id')->references('id')->on('reasons');

            $table->dropColumn('reason');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_contacts', function (Blueprint $table) {
            $table->integer('reason');

            $table->dropForeign('site_contacts_reason_id_foreign');
        });

        DB::statement('update site_contacts set reason = reason_id');

        Schema::table('site_contacts', function (Blueprint $table) {
            $table->dropColumn('reason_id');
        });
    }
}
