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
        Schema::dropIfExists('likes');
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->foreign('username')->references('username')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade')->onUpdate('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
        // Schema::table('likes', function (Blueprint $table){
        //     $table->dropForeign('likes_username_foreign');
        // });
    }
};
