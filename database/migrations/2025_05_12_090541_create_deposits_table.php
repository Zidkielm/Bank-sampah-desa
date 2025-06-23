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
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->string('user_id', 20);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('waste_type_id')->constrained()->onDelete('restrict');
            $table->string('receiver_id', 20);
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('restrict');
            $table->date('deposit_date');
            $table->decimal('weight_kg', 15, 2);
            $table->decimal('price_per_kg', 15, 2);
            $table->decimal('total_amount', 15, 2);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposits');
    }
};
