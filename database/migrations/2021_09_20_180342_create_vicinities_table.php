<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVicinitiesTable extends Migration
{
    public function up()
    {
        Schema::create('vicinities', function (Blueprint $table) {
            $table->id();
            $table->integer('area_id');
            $table->string('vicinity_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vicinities');
    }
}
