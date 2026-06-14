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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('post_id')
            //     ->constrained()
            //     ->cascadeOnDelete();
            // Block type
            $table->string('type');
            // Ordering
            $table->unsignedInteger('position')->default(0);
            // Shared layout fields
            $table->unsignedInteger('width')->nullable();
            $table->unsignedInteger('height')->nullable();
            // left | center | right | justify
            $table->string('alignment')->nullable();
            // Block-specific data
            $table->json('data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
