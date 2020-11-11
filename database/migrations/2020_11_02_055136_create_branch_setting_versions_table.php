<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchSettingVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_setting_versions', function (Blueprint $table) {
            $table->id();
            $table->string('branch_id');
            $table->integer('version');
            $table->string('name');
            $table->timestamp('active_at')->nullable();
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
        Schema::dropIfExists('branch_setting_versions');
    }
}
