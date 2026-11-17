
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

            $table->foreignId('hotel_id')
                ->constrained()
                ->restrictOnDelete();

            $table->string('customer_name');
            $table->date('checkin_date');
            $table->date('checkout_date');

            $table->integer('total_nights');

            $table->decimal('price_per_night', 12, 2);
            $table->decimal('total_price', 12, 2);

            $table->string('status')->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
