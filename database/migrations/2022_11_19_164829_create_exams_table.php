<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('lesson_id');
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');

            $table->string('title');
            $table->string('slug')->unique();
            $table->date('date'); // تاریخ شروع
            $table->date('date_end'); // تاریخ پایان
            $table->time('time'); // ساعت شروع
            $table->time('time_end'); // ساعت پایان
            $table->integer('period')->default(60); // مدت امتحان
            $table->integer('random'); // تعداد سوالاتی که رندم نمایش دهد

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
        Schema::dropIfExists('exams');
    }
};
