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
        Schema::create('trash', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->string('hash', 256)->unique();
            $table->text('data');
            $table->integer('size');
            $table->integer('date_created');
            $table->string('media_type', 255);
            $table->string('mime_type', 255);
            $table->string('latitude', 50);
            $table->string('longitude', 50);
            $table->integer('created_at');
            $table->integer('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trash');
    }
};
