<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteContactRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_contact_replies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('site_contact_id');
            $table->text('message');
            $table->timestamps();

            $table->foreign('site_contact_id')
                  ->references('id')
                  ->on('site_contacts')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_contact_replies');
    }
}
