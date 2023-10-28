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
        Schema::create('parent_kid', function (Blueprint $table) {

            $table->unsignedBigInteger('parent_id');
            $table->unsignedBigInteger('kid_id');

            $table->foreign('parent_id')->references('id')->on('users');
            $table->foreign('kid_id')->references('id')->on('kids');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parent_kid');
    }
};
