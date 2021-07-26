<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site_title');
            $table->longText('site_description')->nullable();
            $table->string('company_full_address');
            $table->string('company_email');
            $table->longText('google_map_location');
            $table->string('support_number');
            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
