<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salleries', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->double('sallery_amount')->default(0);
            $table->integer('sallery_month');
            $table->integer('sallery_year');
            $table->boolean('payment_status')->default(false);
            $table->boolean('is_settled')->default(false);
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
        Schema::dropIfExists('salleries');
    }
}
