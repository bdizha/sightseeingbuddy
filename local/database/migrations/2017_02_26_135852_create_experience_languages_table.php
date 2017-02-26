<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienceLanguagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('experience_languages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('experience_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->timestamps();

            $table->foreign('experience_id')->references('id')->on('experiences');
            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('experience_languages', function (Blueprint $table) {
            $table->dropForeign(['experience_id']);
            $table->dropForeign(['language_id']);
        });

        Schema::dropIfExists('experience_languages');
    }

}
