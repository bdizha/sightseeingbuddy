<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricingsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pricings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guests');
            $table->string('per_person');
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
        Schema::table('pricings', function (Blueprint $table) {
            $table->dropForeign(['experience_id']);
        });
        
        Schema::dropIfExists('pricings');
    }

}
