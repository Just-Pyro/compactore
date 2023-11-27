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
        Schema::create('surplus_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('surplus_id');
            $table->foreign('surplus_id')->references('id')->on('surpluses');
            $table->index('surplus_id');
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
        Schema::dropIfExists('surplus_media');
    }
};
