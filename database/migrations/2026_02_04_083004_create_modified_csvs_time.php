<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modified_csvs_time', function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->string('name');
            $table->string('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('modified_csvs_time')) {
            Schema::dropIfExists('modified_csvs_time');
        }
    }
};
