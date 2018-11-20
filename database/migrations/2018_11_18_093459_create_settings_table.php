<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name');
            $table->string('site_logo');
            $table->string('site_mail');
            $table->string('site_phone');
            $table->string('site_facebook');
            $table->string('site_twitter');
            $table->string('site_linkedin');
            $table->string('site_git');
            $table->text('site_desc');
            $table->text('site_tags');
            $table->string('site_status');
            $table->text('site_close');
            $table->text('site_copyright');
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
        Schema::dropIfExists('settings');
    }
}
