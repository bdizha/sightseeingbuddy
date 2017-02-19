<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->string('street_address');
            $table->string('postal_code');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        
        Schema::table('locations', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['city_id']);
            $table->dropForeign(['country_id']);
        });
        
        Schema::dropIfExists('locations');
    }

}
