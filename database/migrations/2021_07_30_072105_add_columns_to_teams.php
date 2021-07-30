<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToTeams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->date('started_from');
            $table->date('ended_at')->nullable();
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->date('started_from');
            $table->date('ended_at')->nullable();
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('address');
        });
    }
}
