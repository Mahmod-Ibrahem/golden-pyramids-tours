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
        Schema::create('tour_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tours_id');
            $table->foreign('tours_id')->references('id')->on('tours')->onDelete('cascade');
            $table->string('slug');
            $table->string('locale');
            $table->text('title');
            $table->text('description');
            $table->text('itenary_title')->nullable();
            $table->text('itenary_section')->nullable();
            $table->text('included')->nullable();
            $table->text('excluded')->nullable();
            $table->text('duration')->nullable();
            $table->json('locations');
            $table->string('places');
            $table->unique(['tours_id', 'locale']);
            $table->unique(['slug', 'locale']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_translations');
    }
};
