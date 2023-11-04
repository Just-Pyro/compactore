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
        Schema::table('userdetails', function (Blueprint $table) {
            $table->date('birthdate')->nullable()->change();
            $table->string('profileImage')->nullable()->change();
        });

        Schema::table('shops', function (Blueprint $table) {
            $table->string('shopProfileImg')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('userdetails', function (Blueprint $table) {
            //
        });
    }
};
