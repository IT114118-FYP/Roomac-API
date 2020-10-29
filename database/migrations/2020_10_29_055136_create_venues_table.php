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
            $table->string('id')->unique();
            $table->string('branch_id')->nullable();
            $table->string('title_en');
            $table->string('title_hk');
            $table->string('title_cn');
            $table->timeTz('opening_time');
            $table->timeTz('closing_time');
            $table->timestamps();
            $table->softDeletes();

            $table->primary('id');
            $table->foreign('branch_id')->references('id')->on('branches')->constrained()->onDelete('set null');
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
