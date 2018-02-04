<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienceSchedulesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('experience_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('days');
            $table->mediumText('times');
            $table->integer('experience_id')->unsigned();
            $table->timestamps();

            $table->foreign('experience_id')->references('id')->on('experiences');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('experience_schedules', function (Blueprint $table) {
            $table->dropForeign(['experience_id']);
        });
        
        Schema::dropIfExists('experience_schedules');
    }

}
