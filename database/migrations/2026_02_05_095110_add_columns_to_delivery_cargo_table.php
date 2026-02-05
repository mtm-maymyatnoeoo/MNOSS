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
        Schema::table('delivery_cargo', function (Blueprint $table) {
            $table->string('name')->nullable()->after('id'); // after a column
            $table->string('register_phone')->nullable();
            $table->string('kpay_phone')->nullable();
            $table->date('register_date')->nullable();
            $table->boolean('is_active')->default(true)->after('register_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('delivery_cargo', function (Blueprint $table) {
            $table->dropColumn(['name', 'register_phone', 'kpay_phone', 'register_date', 'is_active']);
        });
    }
};
