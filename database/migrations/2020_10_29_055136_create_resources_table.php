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
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->string('branch_id');
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

            $table->foreign('category_id')->references('id')->on('categories')->constrained()->onDelete('set null');
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
        Schema::dropIfExists('resources');
    }
}
