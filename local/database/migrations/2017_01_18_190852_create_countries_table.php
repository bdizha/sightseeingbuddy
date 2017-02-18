<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('locations', function (Blueprint $table) {
            $table->dropForeign(['country_id']);
        });
        
        Schema::table('experiences', function (Blueprint $table) {
            $table->dropForeign(['country_id']);
        });
        
        Schema::dropIfExists('countries');
    }

}
