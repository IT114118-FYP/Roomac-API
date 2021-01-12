<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('branch_id');
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->bigInteger('tos_id')->unsigned()->nullable();
            $table->string('number');
            $table->string('title_en')->nullable();
            $table->string('title_hk')->nullable();
            $table->string('title_cn')->nullable();
            $table->string('image_url')->nullable();
            $table->integer('min_user')->nullable();
            $table->integer('max_user')->nullable();
            $table->time('opening_time');
            $table->time('closing_time');
            $table->timestamps();

            $table->foreign('branch_id')->references('id')->on('branches')->constrained()->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->constrained()->onDelete('set null');
            $table->foreign('tos_id')->references('id')->on('tos')->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources');
    }
}
