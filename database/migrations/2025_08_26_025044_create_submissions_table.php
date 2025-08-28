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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // student who submitted
            $table->text('pasted_text')->nullable(); // if student pasted text
            $table->string('uploaded_file')->nullable(); // if student uploaded file
            $table->float('plagiarism_score')->nullable();
            $table->integer('total_words')->nullable();
            $table->integer('plagiarized_words')->nullable();
            $table->longText('text_analysis')->nullable();
            $table->json('sources_found')->nullable(); // store article links in JSON
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
