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
        Schema::create('delivery_kpay_detail', function (Blueprint $table) {
            $table->id();
            $table->string('order_no', 100);
            $table->boolean('kpay_received');
            $table->date('kpay_received_date');
            $table->binary('ss')->nullable();
            $table->string('ss_path', 100)->nullable();

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
        Schema::dropIfExists('delivery_kpay_detail');
    }
};
