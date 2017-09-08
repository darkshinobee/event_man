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
            $table->string('state');
            $table->longText('description');
            $table->string('category');
            $table->string('organizer')->nullable();
            $table->integer('organizer_id')->unsigned();
            $table->boolean('event_type');
            $table->integer('ticket_count');
            $table->integer('early_bird')->unsigned()->nullable()->default(0);
            $table->integer('early_max')->unsigned()->nullable();
            $table->integer('vip_fee')->unsigned()->nullable()->default(0);
            $table->integer('vip_max')->unsigned()->nullable();
            $table->integer('regular_fee')->unsigned()->default(0);
            $table->integer('regular_max')->unsigned()->nullable();
            $table->integer('hits')->unsigned()->default(0);
            $table->integer('misses')->unsigned()->default(0);
            $table->string('slug');
            $table->string('image_path')->nullable();
            $table->boolean('status')->default(0);
            $table->date('event_start_date');
            $table->time('event_start_time');
            // $table->date('event_end_date')->nullable();
            // $table->time('event_end_time')->nullable();
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
