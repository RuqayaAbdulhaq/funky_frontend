<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lookup', function (Blueprint $table) {

            $table->unsignedBigInteger('img_id')
                ->nullable()
                ->after('type');

            $table->foreign('img_id')
                ->references('media_id')
                ->on('media')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('lookup', function (Blueprint $table) {

            $table->dropForeign(['img_id']);

            $table->dropColumn('img_id');
        });
    }
};