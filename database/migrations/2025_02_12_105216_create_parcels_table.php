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
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('parcel_image');
            $table->string('tracking_number')->unique();
            $table->string('size');
            $table->integer('qty');
            $table->decimal('price');
            $table->string('receiver_name');
            $table->string('receiver_location');
            $table->enum('status', ['In Store', 'Shipped', 'On Transit', 'Delivered'])->default('In Store');
            $table->string('estimated_delivery_date')->nullable();
            $table->foreignId('courier_id')->constrained();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcels');
    }
};
