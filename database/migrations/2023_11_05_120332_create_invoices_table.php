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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->string('amount')->nullable();
            $table->string('invoice_date')->nullable();
            $table->string('invoice_note')->nullable();
            $table->string('invoice_number')->nullable();
            $table->enum('invoice_status', PaymentStatusEnum::getValues())->default(PaymentStatusEnum::IN_PROGRESS)->nullable();

            $table->unsignedBigInteger('kindergarten_id')->nullable();
            $table->foreign('kindergarten_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('payment_id')->nullable();
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
