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
        Schema::create('surplus_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->index('user_id');
            $table->string('username');
            $table->unsignedBigInteger('otherUser_id');
            $table->foreign('otherUser_id')->references('id')->on('users');
            $table->index('otherUser_id');
            $table->text('reviewDetails')->nullable();
            $table->integer('rating');
            $table->text('profileImg')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surplus_reviews');
    }
};
