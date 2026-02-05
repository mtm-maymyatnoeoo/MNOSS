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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_code', 100)->unique();
            $table->foreignId('brand_id')->constrained('brand');
            $table->string('name', 100);
            $table->string('description', 200)->nullable();
            $table->string('color', 100)->nullable();
            $table->string('size', 100)->nullable();
            $table->string('remark', 100)->nullable();
            $table->foreignId('cargo_id')->nullable()->constrained('cargo');
            $table->string('item_image_link', 100)->nullable();
            $table->binary('item_image_ss')->nullable();
            $table->string('item_image_path', 100)->nullable();
            $table->string('price', 100)->nullable();
            $table->boolean('delete_flg')->default(false);

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
        Schema::dropIfExists('items');
    }
};
