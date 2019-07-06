<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Init extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')
                ->unsigned();
            $table->string('type', 20);
            $table->tinyInteger('sets')
                ->unsigned();
            $table->tinyInteger('legs')
                ->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });

        Schema::create('match_users', function (Blueprint $table) {
            $table->bigInteger('match_id')
                ->unsigned();
            $table->bigInteger('user_id')
                ->unsigned();
            $table->tinyInteger('sort')
                ->unsigned();

            $table->timestamps();

            $table->foreign('match_id')
                ->references('id')
                ->on('matches');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });

        Schema::create('sets', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('match_id')
                ->unsigned();
            $table->tinyInteger('set_number')
                ->unsigned();
            $table->bigInteger('winner_id')
                ->unsigned()
                ->nullable();

            $table->foreign('match_id')
                ->references('id')
                ->on('matches');
            $table->foreign('winner_id')
                ->references('id')
                ->on('users');
        });

        Schema::create('legs', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('set_id')
                ->unsigned();
            $table->tinyInteger('leg_number')
                ->unsigned();
            $table->bigInteger('winner_id')
                ->unsigned()
                ->nullable();

            $table->foreign('set_id')
                ->references('id')
                ->on('sets');
            $table->foreign('winner_id')
                ->references('id')
                ->on('users');
        });

        Schema::create('throws', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id')
                ->unsigned();
            $table->bigInteger('match_id')
                ->unsigned();

            $table->tinyInteger('turn')
                ->unsigned();

            $table->foreign('match_id')
                ->references('id')
                ->on('matches');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });

        Schema::create('friends', function (Blueprint $table) {
            $table->bigInteger('user_1_id')
                ->unsigned();
            $table->bigInteger('user_2_id')
                ->unsigned();
            $table->boolean('accepted')
                ->default(false);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_1_id')
                ->references('id')
                ->on('users');
            $table->foreign('user_2_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friends');
        Schema::dropIfExists('throws');
        Schema::dropIfExists('legs');
        Schema::dropIfExists('sets');
        Schema::dropIfExists('matches');
        Schema::dropIfExists('match_users');
    }
}
