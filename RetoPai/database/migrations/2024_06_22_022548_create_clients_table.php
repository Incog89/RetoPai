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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();                                      // ID único
            $table->string('name',100);                            // Nombre
            $table->string('email',50)->unique();                 // Email
            $table->string('phone',50)->nullable();               // Teléfono
            $table->date('birthdate')->nullable();             // Fecha de Nacimiento
            $table->json('address')->nullable();               // Dirección en JSON
            $table->string('stripe_customer_id')->nullable();  // ID en Stripe
            $table->timestamps();                              // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
