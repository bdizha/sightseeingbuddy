<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('country_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('locations', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
        });
        
        Schema::table('experiences', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
        });
        
        Schema::dropIfExists('cities');
    }

}
