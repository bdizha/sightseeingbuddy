<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBookingsTableExtra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropIfExists();
        });

        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('reference')->nullable();
            $table->integer('experience_id')->unsigned();
            $table->integer('pricing_id')->unsigned();
            $table->integer('schedule_id')->unsigned();
            $table->string('amount')->nullable();
            $table->integer('local_id')->unsigned();
            $table->string('time')->nullable();
            $table->text('message')->nullable();
            $table->mediumText('special_requests');
            $table->date('date')->nullable();
            $table->enum('status', ['pending', 'processed', 'cancelled', 'failed'])->default('pending');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('experience_id')->references('id')->on('experiences');
            $table->foreign('pricing_id')->references('id')->on('pricings');
            $table->foreign('schedule_id')->references('id')->on('experience_schedules');
            $table->foreign('local_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            //
        });
    }
}
