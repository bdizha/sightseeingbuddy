<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTableAddIntroductionFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('introductions');
        Schema::dropIfExists('contacts');

        Schema::table('users', function (Blueprint $table) {
            $table->enum('gender', ['female', 'male']);
            $table->string('mobile');
            $table->string('telephone');
            $table->string('id_number');
            $table->text('reason');
            $table->text('description');
            $table->string('image')->default();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
