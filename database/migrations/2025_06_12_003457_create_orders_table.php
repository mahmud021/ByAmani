<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // customer + tracking
            $table->string('tracking_code')->unique();
            $table->string('customer_name');
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_address');          // now required

            // delivery locality + fee
            $table->foreignId('locality_id')             // admin-managed list
            ->nullable()                           // ← keep nullable for legacy rows
            ->constrained()
                ->nullOnDelete();
            $table->decimal('delivery_fee', 10, 2)->default(0);

            // extras
            $table->string('receipt')->nullable();
            $table->string('status')->default('pending');   // pending, confirmed, cancelled
            $table->timestamp('receipt_uploaded_at')->nullable();

            // totals
            $table->decimal('total_amount', 10, 2);         // items + delivery_fee

            $table->timestamps();
        });

    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
