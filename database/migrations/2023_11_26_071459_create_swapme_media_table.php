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
        Schema::create('swapme_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('swapPost_id');
            $table->foreign('swapPost_id')->references('id')->on('swap_posts');
            $table->index('swapPost_id');
            $table->text('file_path');
            $table->text('file_name');
            $table->text('file_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('swapme_media');
    }
};
