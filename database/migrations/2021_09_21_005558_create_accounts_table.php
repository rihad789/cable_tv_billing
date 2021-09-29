<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{

    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('quantity');
            $table->double('single_unit_price');
            $table->double('total_amount');
            $table->string('memo_no');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
