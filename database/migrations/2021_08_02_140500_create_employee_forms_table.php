<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeFormsTable extends Migration
{
    public function up()
    {
        Schema::create('employee_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->longText('additional_message');
            $table->boolean('approved')->default(0)->nullable();
            $table->timestamps();
        });
    }
}
