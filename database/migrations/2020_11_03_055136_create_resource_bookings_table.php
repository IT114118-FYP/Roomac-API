<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourceBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('resource_id')->unsigned()->nullable();
            $table->bigInteger('branch_setting_version_id')->unsigned()->nullable();
            $table->string('number')->nullable();
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->timestamp('checkin_time')->nullable();
            $table->integer('edit_count')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->foreign('resource_id')->references('id')->on('resources')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('resource_bookings');
    }
}
