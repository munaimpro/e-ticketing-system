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
        Schema::create('available_seats', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('bus_id'); // Foreign key
            $table->date('doj'); // Date of journey
            $table->json('seats'); // Seats as JSON
            $table->timestamps(); // created_at and updated_at columns

            // Add a foreign key constraint if you have a buses table
             $table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('available_seats');
    }
};
