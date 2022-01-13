<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('f_name');
            $table->string('s_name');
            $table->string('l_name')->nullable();
            $table->bigInteger('pnfl')->nullable()->default(null);
            $table->date('birthday')->nullable();
            $table->text('address')->nullable();
            $table->string('entering_number',100)->nullable();
            $table->date('entering_date')->nullable();
            $table->date('starting_date')->nullable();
            $table->string('finishing_number',100)->nullable();
            $table->date('finishing_data')->nullable();
            $table->string('certificate_number',100)->nullable();
            $table->string('course_name')->nullable();
            $table->date('certificate_date')->nullable();
            $table->string('qr_code')->nullable();
            $table->string('photo');
            $table->string('certificate_photo')->nullable();
            $table->integer('status')->default(1);
            $table->unsignedBigInteger('college_id');
            $table->foreign('college_id')->references('id')
                ->on('colleges')->onDelete('cascade');
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')
                ->on('courses');
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
        Schema::dropIfExists('students');
    }
}
