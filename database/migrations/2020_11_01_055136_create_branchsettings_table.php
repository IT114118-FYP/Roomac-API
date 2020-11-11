<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_settings', function (Blueprint $table) {
            $table->id();
            $table->string('branch_id')->nullable();
            $table->string('setting_id')->nullable();
            $table->binary('value');
            $table->integer('version');
            $table->timestamps();

            $table->foreign('branch_id')->references('id')->on('branches')->constrained()->onDelete('cascade');
            $table->foreign('setting_id')->references('id')->on('settings')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branch_settings');
    }
}
