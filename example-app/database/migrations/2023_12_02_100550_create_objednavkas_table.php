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
        Schema::create('objednavkas', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('users');;
            $table->decimal('total_amount', 10);
            $table->string('status', 20)->default('Vybavujeme');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objednavkas');
    }
};
