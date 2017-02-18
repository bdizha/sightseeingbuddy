<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('type', ['local', 'guest'])->default('local');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        
        Schema::table('experiences', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        
        Schema::table('locations', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        
        Schema::table('introductions', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        
        Schema::table('wallets', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('users');
    }

}
