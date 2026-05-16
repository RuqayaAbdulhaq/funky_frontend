<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog_lookup', function (Blueprint $table) {

            $table->bigIncrements('blog_lookup_id');

            $table->unsignedBigInteger('blog_id');

            $table->unsignedBigInteger('lookup_id');

            $table->timestamps();

            $table->foreign('blog_id')
                ->references('blog_id')
                ->on('blog')
                ->onDelete('cascade');

            $table->foreign('lookup_id')
                ->references('id')
                ->on('lookup')
                ->onDelete('cascade');

            $table->unique([
                'blog_id',
                'lookup_id'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_lookup');
    }
};