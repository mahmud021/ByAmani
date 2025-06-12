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
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('locality_id')   // allow null for existing rows
            ->nullable()
                ->after('customer_address');

            $table->decimal('delivery_fee', 10, 2)
                ->default(0)
                ->after('locality_id');
        });

        // add the FK constraint separately
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('locality_id')
                ->references('id')
                ->on('localities')
                ->nullOnDelete();            // set to NULL if locality deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
