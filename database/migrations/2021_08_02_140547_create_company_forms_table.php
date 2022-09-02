<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyFormsTable extends Migration
{
    public function up()
    {
        Schema::create('company_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('company_location');
            $table->string('company_contact');
            $table->string('name');
            $table->string('email');
            $table->string('contact');
            $table->string('subject');
            $table->longText('message');
            $table->timestamps();
        });
    }
}
