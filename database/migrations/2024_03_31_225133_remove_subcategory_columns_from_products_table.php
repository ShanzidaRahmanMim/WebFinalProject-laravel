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
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['product_subcategory_id', 'product_subcategory_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            
            $table->integer('product_subcategory_id')->after('product_category_id');
            $table->string('product_subcategory_name')->after('product_subcategory_id');
    });
    }
};
