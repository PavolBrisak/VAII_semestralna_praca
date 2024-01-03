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
            $table->id()->autoIncrement();
            $table->string('nazov');
            $table->string('popis');
            $table->string('kategoria');
            $table->binary('obrazok');
            $table->decimal('cena', 10);
            $table->integer('na_sklade')->default(0);
            $table->unsignedInteger('pocet_predanych')->default(0);
            $table->boolean('je_v_zlave')->default(false);
            $table->decimal('cena_zlava', 10)->nullable();
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
