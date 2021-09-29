<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('client_id');
            $table->string('client_name');
            $table->string('client_father');
            $table->string('area');
            $table->string('vicinity');
            $table->string('address');
            $table->string('initialization_date');
            $table->string('disconnection_date')->nullable();
            $table->string('mobile_no');
            $table->string('locked_fund');
            $table->boolean('connection_status')->default(true);
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
        Schema::dropIfExists('subscribers');
    }
}
