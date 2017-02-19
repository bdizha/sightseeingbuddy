<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntroductionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('introductions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->enum('gender', ['female', 'male']);
            $table->string('id_number');
            $table->text('reason');
            $table->text('description');
            $table->string('image');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        
        Schema::table('introductions', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        
        Schema::dropIfExists('introductions');
    }

}
