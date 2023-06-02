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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->foreign('username')->references('username')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('image');
            $table->string('description');
            $table->string('category', 1);
            $table->string('hair_length');
            $table->string('hair_style');
            $table->string('hair_type');
            $table->string('location_name')->nullable();
            $table->string('location_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
