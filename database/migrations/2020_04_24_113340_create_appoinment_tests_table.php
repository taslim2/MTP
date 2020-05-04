<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppoinmentTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appoinment_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('appoinment_id');
            $table->unsignedBigInteger('test_id');
            $table->double('cost',7,2);
            $table->foreign('appoinment_id')->references('id')->on('appoinments');
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
        Schema::dropIfExists('appoinment_tests');
    }
}



