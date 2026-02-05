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
        Schema::create('township', function (Blueprint $table) {
            $table->id();
            $table->string('township_code', 100)->unique();
            $table->string('short_name', 100);
            $table->string('long_name', 100)->nullable();
            $table->string('name_mm', 100)->nullable();
            $table->string('remark', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('township');
    }
};
