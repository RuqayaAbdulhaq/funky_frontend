<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blog', function (Blueprint $table) {

            $table->dropColumn([
                'thumb_img',
                'main_img'
            ]);

            $table->unsignedBigInteger('thumb_img_id')
                ->nullable()
                ->after('title');

            $table->unsignedBigInteger('main_img_id')
                ->nullable()
                ->after('thumb_img_id');

            $table->foreign('thumb_img_id')
                ->references('media_id')
                ->on('media')
                ->nullOnDelete();

            $table->foreign('main_img_id')
                ->references('media_id')
                ->on('media')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('blog', function (Blueprint $table) {

            $table->dropForeign(['thumb_img_id']);
            $table->dropForeign(['main_img_id']);

            $table->dropColumn([
                'thumb_img_id',
                'main_img_id'
            ]);

            $table->string('thumb_img')->nullable();
            $table->string('main_img')->nullable();
        });
    }
};