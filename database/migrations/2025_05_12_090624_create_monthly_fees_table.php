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
        Schema::create('monthly_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('receiver_id')->constrained('users')->onDelete('restrict');
            $table->date('payment_date');
            $table->decimal('amount', 10, 2);
            $table->enum('payment_method', ['cash', 'transfer'])->default('cash');
            $table->enum('status', ['paid', 'unpaid', 'partial'])->default('unpaid');
            $table->string('proof_image')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_fees');
    }
};
