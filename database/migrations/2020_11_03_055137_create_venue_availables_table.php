<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenueAvailablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venue_availables', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('venue_id')->unsigned();
            $table->timeTz('start_time');
            $table->timeTz('end_time');
            $table->integer('day_of_week');
            $table->boolean('repeat');
            $table->timestamps();

            $table->foreign('venue_id')->references('id')->on('venues')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venue_availables');
    }
}
