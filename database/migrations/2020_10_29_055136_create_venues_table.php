<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->id();
            $table->string('branch_id');
            $table->string('number');
            $table->string('title_en')->nullable();
            $table->string('title_hk')->nullable();
            $table->string('title_cn')->nullable();
            $table->timeTz('opening_time');
            $table->timeTz('closing_time');
            $table->timestamps();

            $table->foreign('branch_id')->references('id')->on('branches')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venues');
    }
}
