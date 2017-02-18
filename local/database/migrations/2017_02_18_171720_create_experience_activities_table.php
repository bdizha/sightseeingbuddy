<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienceActivitiesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('experience_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('experience_id')->unsigned();
            $table->text('description');
            $table->string('transportation_mode');
            $table->tinyInteger('charge');
            $table->timestamps();

            $table->foreign('experience_id')->references('id')->on('experiences');
        });
    }

    /**
     * Reverse the migrations.
     *
     * 
     *  'experience_id',
        'description',
        'transportation_mode',
        'charge'
     * 
     * @return void
     */
    public function down() {
        Schema::dropIfExists('experience_activities');
    }

}
