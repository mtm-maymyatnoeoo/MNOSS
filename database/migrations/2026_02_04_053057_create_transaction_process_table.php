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
        Schema::create('transaction_process', function (Blueprint $table) {
            $table->id();
            $table->string('order_item_code', 100);
            $table->string('transfer_amount', 100);
            $table->string('local_fee_amount', 100);
            $table->string('local_fee_paid_status', 100);
            $table->string('local_fee_paid_date', 100)->nullable();
            $table->string('transfer_date', 100)->nullable();
            $table->binary('transfer_ss')->nullable();
            $table->string('transfer_ss_path', 100)->nullable();
            $table->string('status', 100);
            $table->string('substract_reason', 100)->nullable();
            $table->string('substract_amount', 100)->nullable();

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
        Schema::dropIfExists('transaction_process');
    }
};
