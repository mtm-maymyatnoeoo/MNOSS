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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_no', 100)->unique();
            $table->string('customer_code', 100);
            $table->string('total_item_quantity', 100)->nullable();
            $table->string('payment_status', 100)->nullable();
            $table->string('payment_method', 100)->nullable();
            $table->string('total_amount', 100)->nullable();
            $table->string('cod_amount', 100)->nullable();
            $table->date('order_date')->nullable();
            $table->string('order_status', 100)->nullable();
            $table->string('delivery_cargo_code', 100)->nullable();
            $table->string('remark', 200)->nullable();
            $table->binary('order_parcel_image')->nullable();
            $table->string('order_parcel_image_path', 100)->nullable();

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
        Schema::dropIfExists('orders');
    }
};
