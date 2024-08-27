<?php

use App\Models\Company;
use App\Models\User;
use App\Models\UserPolicy;
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
        Schema::create('user_policies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('img')->nullable();
            $table->string('price')->nullable();

            $table->text('text')->nullable();

            $table->json('files')->nullable();
            $table->json('params')->nullable();
            $table->foreignIdFor(User::class)
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(Company::class)
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();
            $table->string('published')->default(1);
            $table->integer('sorting')->default(999);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_policies');
    }
};
