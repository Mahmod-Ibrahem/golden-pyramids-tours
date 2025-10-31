<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tour_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('nationality');
            $table->string('adult');
            $table->string('children_under_12');
            $table->string('children_under_6');
            $table->string('price_per_adult_person');
            $table->string('price_per_child_under_12');
            $table->string('price_per_child_under_6');
            $table->string('total_price');
            $table->date('start_date');
            $table->foreignId('tour_id')->constrained('tours');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_bookings');
    }
};
