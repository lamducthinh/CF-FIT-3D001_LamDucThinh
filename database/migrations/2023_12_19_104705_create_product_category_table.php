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
        Schema::create('product_category', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('slug',255);
            $table->string('position',255);
            $table->date('birthday');
            $table->string('address',255);
            $table->timestamps();
            
        });
        Schema::table('product', function (Blueprint $table) {
            //B1: Create Collunm FK
            $table->unsignedBigInteger('product_category_id');
            //B2 Create FK reference product_category (id)
            $table->foreign('product_category_id')->references('id')->on('product_category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_category');
    }
};
