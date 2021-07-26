<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrGeneratesTable extends Migration
{
    public function up()
    {
        Schema::create('qr_generates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('qr_code')->nullable();
            $table->string('qr_photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
