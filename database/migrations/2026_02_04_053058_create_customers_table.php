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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_code', 100)->unique();
            $table->string('name', 100);
            $table->string('account_name', 100)->nullable();
            $table->string('other_account_name', 100)->nullable();
            $table->string('social_platform', 100)->nullable();
            $table->string('social_link', 300)->nullable();
            $table->string('phone_number', 100)->nullable();
            $table->string('other_phone_number', 100)->nullable();
            $table->foreignId('customer_address_id')->nullable()->constrained('customer_address');
            $table->binary('profile_ss')->nullable();
            $table->string('profile_image_path', 100)->nullable();
            $table->string('remark', 200)->nullable();

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
        Schema::dropIfExists('customers');
    }
};
