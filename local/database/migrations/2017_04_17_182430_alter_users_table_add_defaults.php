<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTableAddDefaults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('mobile');
            $table->dropColumn('telephone');
            $table->dropColumn('id_number');
            $table->dropColumn('reason');
            $table->dropColumn('description');
            $table->dropColumn('image');
        });

        Schema::table('users', function (Blueprint $table) {

            $table->string('mobile')->nullable();
            $table->string('telephone')->nullable();
            $table->string('id_number')->nullable();
            $table->text('reason')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
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
