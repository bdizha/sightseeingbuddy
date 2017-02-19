<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienceGalleriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('experience_galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
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
        Schema::table('experience_galleries', function (Blueprint $table) {
            $table->dropForeign(['experience_id']);
        });
        
        Schema::dropIfExists('experience_galleries');
    }

}
