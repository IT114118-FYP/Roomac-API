<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourceAvailablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_availables', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('resource_id')->unsigned();
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('day_of_week');
            $table->boolean('repeat');
            $table->timestamps();

            $table->foreign('resource_id')->references('id')->on('resources')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resource_availables');
    }
}
