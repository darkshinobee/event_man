<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookedEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booked_events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->unsigned();
            $table->integer('attendee_id')->unsigned();
            $table->string('ticket_type');
            $table->integer('amount')->unsigned();
            $table->integer('quantity')->unsigned();
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
        Schema::dropIfExists('booked_events');
    }
}
