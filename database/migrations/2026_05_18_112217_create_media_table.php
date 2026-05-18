<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {

            $table->bigIncrements('media_id');

            $table->string('title')->nullable();

            $table->string('file_name');

            $table->string('file_path');

            $table->string('file_type')->nullable();

            $table->string('mime_type')->nullable();

            $table->unsignedBigInteger('file_size')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};