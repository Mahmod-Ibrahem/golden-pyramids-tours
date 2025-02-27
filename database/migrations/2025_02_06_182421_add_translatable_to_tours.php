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
        Schema::table('tours', function (Blueprint $table) {
            $table->text('slug');
            $table->text('title');
            $table->text('description');
            $table->text('itenary_title')->nullable();
            $table->longText('itenary_section')->nullable();
            $table->text('included')->nullable();
            $table->text('excluded')->nullable();
            $table->text('duration')->nullable();
            $table->json('locations');
            $table->text('places');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            //
        });
    }
};
