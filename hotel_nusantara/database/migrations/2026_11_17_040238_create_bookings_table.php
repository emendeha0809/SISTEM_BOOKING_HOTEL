<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->string('booking_code')->unique();

            $table->string('customer_name');
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();

            $table->date('checkin_date');
            $table->date('checkout_date');

            $table->unsignedInteger('total_nights');

            $table->decimal('price_per_night', 12, 2);
            $table->decimal('total_price', 12, 2);

            $table->string('status')->default('pending');

            $table->string('source')->default('hotelin');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
