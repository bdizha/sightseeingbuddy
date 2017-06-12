<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('experience_id')->unsigned();
            $table->enum('status', ['pending', 'success', 'processed', 'cancelled'])->default('pending');
            $table->integer('pricing_id')->unsigned();
            $table->integer('schedule_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('experience_id')->references('id')->on('experiences');
            $table->foreign('pricing_id')->references('id')->on('pricings');
            $table->foreign('schedule_id')->references('id')->on('experience_schedules');
        });
    }

    /**
     * 
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['experience_id']);
            $table->dropForeign(['pricing_id']);
            $table->dropForeign(['schedule_id']);
        });
        
        Schema::dropIfExists('bookings');
    }

}
