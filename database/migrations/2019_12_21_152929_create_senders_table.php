<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('banks_id');
            $table->integer('agency');
            $table->string('account',10);
            $table->unsignedBigInteger('account_types_id');
            $table->string('name');
            $table->string('document');
            $table->timestamps();

            $table->foreign('banks_id')->references('id')->on('banks')->onDelete('cascade');
            $table->foreign('account_types_id')->references('id')->on('account_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('senders');
    }
}
