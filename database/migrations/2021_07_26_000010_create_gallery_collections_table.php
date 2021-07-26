<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryCollectionsTable extends Migration
{
    public function up()
    {
        Schema::create('gallery_collections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('collection_name');
            $table->timestamps();
        });
    }
}
