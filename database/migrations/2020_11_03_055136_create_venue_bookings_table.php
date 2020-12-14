<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenueBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venue_bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('venue_id')->unsigned()->nullable();
            $table->bigInteger('branch_setting_version_id')->unsigned()->nullable();
            $table->timestampTz('start_time');
            $table->timestampTz('end_time');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('set null');
            $table->foreign('venue_id')->references('id')->on('venues')->constrained()->onDelete('set null');
            $table->foreign('branch_setting_version_id')->references('id')->on('branch_setting_versions')->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venue_bookings');
    }
}
