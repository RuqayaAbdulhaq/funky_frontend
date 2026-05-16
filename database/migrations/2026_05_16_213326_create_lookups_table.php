<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lookup', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('title');

            $table->string('type');

            $table->string('img')->nullable();

            $table->text('description')->nullable();

            $table->timestamps();

            $table->index('type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lookup');
    }
};