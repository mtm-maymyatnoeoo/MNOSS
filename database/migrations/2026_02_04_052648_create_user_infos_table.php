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
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->string('user_code', 100)->unique();
            $table->string('name', 100);
            $table->string('username', 100)->unique();
            $table->string('password', 255);
            $table->boolean('delete_flg')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_infos');
    }
};
