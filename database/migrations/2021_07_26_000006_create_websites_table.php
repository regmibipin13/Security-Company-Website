<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsitesTable extends Migration
{
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hero_title');
            $table->string('hero_title_2');
            $table->longText('hero_text');
            $table->string('button_1_title');
            $table->string('button_1_link');
            $table->string('button_2_title');
            $table->string('button_2_link');
            $table->longText('about_us_text');
            $table->longText('our_team_text')->nullable();
            $table->timestamps();
        });
    }
}
