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
        Schema::create('withdrawal_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('withdrawal_id')->constrained()->onDelete('cascade');
            $table->string('item_name');
            $table->decimal('quantity', 10, 2);
            $table->decimal('price', 15, 2);
            $table->decimal('total_amount', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdrawal_items');
    }
};
