<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cargo', function (Blueprint $table) {
            $table->id();
            $table->date('sent_date_from_jp')->nullable();
            $table->date('actual_flight_date')->nullable();
            $table->date('arrival_date')->nullable();
            $table->date('arrival_date_to_house')->nullable();
            $table->integer('batch')->nullable();
            $table->string('kg', 100)->nullable();
            $table->string('deli_fee', 100)->nullable();
            $table->string('deli_fee_paid', 100)->nullable()->comment("1:MM,2:JP");
            $table->integer('status')->comment("1:sending,2:on_way,3:arrived");
            $table->string('sender', 100)->nullable();

            $table->foreignId('created_user_id');
            $table->foreignId('updated_user_id')->nullable();
            $table->foreignId('deleted_user_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargo');
    }
};
