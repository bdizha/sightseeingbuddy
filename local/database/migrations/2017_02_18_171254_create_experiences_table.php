<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->string('street_address');
            $table->string('postal_code');
            $table->integer('category_id')->unsigned();
            $table->integer('sub_category_id')->unsigned();
            $table->mediumText('languages');
            $table->string('teaser');
            $table->string('cover_image');
            $table->text('description');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('category_id')->references('id')->on('experience_categories');
            $table->foreign('sub_category_id')->references('id')->on('experience_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

        Schema::table('experiences', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['city_id']);
            $table->dropForeign(['country_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['sub_category_id']);
        });

        Schema::dropIfExists('experiences');
    }

}
