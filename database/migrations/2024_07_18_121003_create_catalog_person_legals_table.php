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
        Schema::create('catalog_person_legals', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('subtitle')->nullable();

            $table->string('img')->nullable();
            $table->text('gallery')->nullable();
            $table->text('smalltext')->nullable();
            $table->string('img2')->nullable();
            $table->text('text')->nullable();

            $table->string('published')->default(1);
            $table->json('params')->nullable();

            $table->string('metatitle')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->integer('sorting')->default(999);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalog_person_legals');
    }
};
