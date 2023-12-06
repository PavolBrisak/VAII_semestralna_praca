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
        Schema::create('produkts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 10);
            $table->string('category');
            $table->unsignedInteger('number_of_sold')->default(0);
            $table->boolean('is_discounted')->default(false);
            $table->decimal('discount_price', 10)->nullable();
            $table->string('picture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produkts');
    }
};
