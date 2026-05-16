<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog', function (Blueprint $table) {

            $table->bigIncrements('blog_id');

            $table->string('title');

            $table->string('thumb_img')->nullable();

            $table->string('main_img')->nullable();

            $table->longText('text');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};