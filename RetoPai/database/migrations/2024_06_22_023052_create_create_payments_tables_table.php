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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();                                      // ID único
            $table->foreignId('client_id')->constrained();     // ID del cliente (clave foránea)
            $table->decimal('amount', 10, 2);                  // Monto
            $table->string('currency', 3);                     // Moneda
            $table->string('stripe_payment_id')->nullable();   // ID de pago en Stripe
            $table->string('status');                          // Estado del pago
            $table->timestamps();                              // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_payments_tables');
    }
};
