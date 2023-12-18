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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id')->nullable();
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->index('shop_id');
            $table->string('code');
            $table->string('type');
            $table->decimal('discount_amount');
            $table->integer('max_usage_limit');
            $table->integer('usage_count')->default(0);
            $table->dateTime('expires_at')->nullable();
            $table->string('applicable_to');
            $table->boolean('is_claimable');
            // $table->unsignedBigInteger('claimed_by')->nullable();
            // $table->foreign('claimed_by')->references('id')->on('users');
            // $table->index('claimed_by');
            // $table->dateTime('claimed_at')->nullable();
            $table->integer('monthly_distribution_limit')->default(0);
            $table->integer('monthly_usage_limit')->default(0);
            $table->date('last_monthly_reset')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
