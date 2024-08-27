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
        Schema::table('user_policies', function (Blueprint $table) {
            $table->string('sku')->nullable();
            $table->string('user_name')->nullable();
            $table->string('user_fio')->nullable();
            $table->string('user_inn')->nullable();
            $table->string('user_phone')->nullable();
            $table->string('user_bin')->nullable();
            $table->string('user_birthdate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_policies', function (Blueprint $table) {
            //
        });
    }
};
