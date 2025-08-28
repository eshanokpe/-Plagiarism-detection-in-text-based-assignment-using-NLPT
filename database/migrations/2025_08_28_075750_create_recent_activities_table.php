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
        Schema::create('recent_activities', function (Blueprint $table) {
            $table->id();
            $table->string('user_type'); // 'user', 'lecturer', or 'admin'
            $table->unsignedBigInteger('user_id')->nullable(); // Optional if anonymous
            $table->string('action'); // e.g., 'Submitted Assignment'
            $table->text('description')->nullable(); // e.g., 'User John submitted "Math Homework"'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recent_activities');
    }
};
