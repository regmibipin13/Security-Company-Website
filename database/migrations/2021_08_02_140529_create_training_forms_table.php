<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingFormsTable extends Migration
{
    public function up()
    {
        Schema::create('training_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('contact');
            $table->string('address');
            $table->string('type');
            $table->longText('message')->nullable();
            $table->timestamps();
        });
    }
}
