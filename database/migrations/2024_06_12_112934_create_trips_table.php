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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained('cars');
            $table->foreignId('schedule_id')->constrained('schedules');
            $table->foreignId('travel_id')->constrained('travels');
            $table->foreignId('depature')->constrained('locations');
            $table->foreignId('destination')->constrained('locations');
            $table->date('tanggal_keberangkatan');
            $table->time('waktu_keberangkatan');
            $table->decimal('harga_tiket', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
