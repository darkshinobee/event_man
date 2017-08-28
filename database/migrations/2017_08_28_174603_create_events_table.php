<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('venue');
            $table->string('category');
            $table->string('organizer')->nullable();
            $table->integer('organizer_id')->unsigned();
            $table->boolean('event_type');
            $table->integer('early_bird')->unsigned()->nullable();
            $table->integer('regular_fee')->unsigned();
            $table->integer('vip_fee')->unsigned()->nullable();
            $table->integer('hits')->unsigned()->default(0);
            $table->integer('misses')->unsigned()->default(0);
            $table->string('slug');
            $table->boolean('age_rating');
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
        Schema::dropIfExists('events');
    }
}
