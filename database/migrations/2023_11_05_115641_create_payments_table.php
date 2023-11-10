<?php

use App\Enums\PaymentStatusEnum;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('amount')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('payment_note')->nullable();
            $table->enum('payment_status', PaymentStatusEnum::getValues())->default(PaymentStatusEnum::IN_PROGRESS)->nullable();

            $table->unsignedBigInteger('kindergarten_id')->nullable();
            $table->foreign('kindergarten_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
