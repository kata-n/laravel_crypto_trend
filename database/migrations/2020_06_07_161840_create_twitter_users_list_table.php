<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTwitterUsersListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('twitter_users_list', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('twitter_user_id');
            $table->string('account_name');
            $table->string('account_screen_name');
            $table->integer('follow_count');
            $table->integer('follower_count');
            $table->string('account_description');
            $table->string('account_text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('twitter_users_list');
    }
}
