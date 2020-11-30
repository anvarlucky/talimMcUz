<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValidatsiyasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validatsiyas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname');
            $table->date('birthday');
            $table->string('address');
            $table->string('course');
            $table->string('courseRegion');
            $table->string('courseDistrict');
            $table->string('enteringNumber');
            $table->date('startDay')->nullable();
            $table->string('exitingNumber')->nullable();
            $table->date('endDay')->nullable();
            $table->string('certNumber')->nullable();
            $table->date('certDate')->nullable();
            $table->string('college');
            $table->integer('status')->default(1);
            $table->string('photo')->nullable();
            $table->string('certPhoto')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('validatsiyas');
    }
}
