<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppoinmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appoinments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('address');
            $table->date('date');
            $table->unsignedBigInteger('hospital_id');
            $table->unsignedBigInteger('test_id');
            $table->double('cost');
            $table->string('phone');
            $table->string('status')->nullable();
            $table->string('prescription')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('hospital_id')->references('id')->on('hospitals');
            $table->foreign('test_id')->references('id')->on('tests');
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
        Schema::dropIfExists('appoinments');
    }
}
