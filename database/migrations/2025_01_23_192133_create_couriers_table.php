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
        Schema::create('couriers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->timestamps();
        });

        // $table->id();
        // $table->string('name');
        // $table->string('tracking_number')->unique();
        // $table->string('sender_name');
        // $table->string('sender_location');
        // $table->string('receiver_name');
        // $table->string('receiver_location');
        // $table->enum('status', ['Shipped', 'In Transit', 'Delivered']);
        // $table->string('estimated_delivery_date')->nullable();
        // $table->foreignId('courier_id')->constrained();
        // $table->timestamps();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('couriers');
    }
};
