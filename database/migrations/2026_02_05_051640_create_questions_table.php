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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['gk_iq', 'mcq', 'group_a', 'group_b']); // Question type
            $table->enum('category', [
                'general_knowledge', 
                'communication_apt', 
                'teaching_apt', 
                'research',
                'bca_bit_subject',
                'recent_trends'
            ])->nullable(); // Category for MCQs
            $table->text('question'); // Question text
            $table->json('options')->nullable(); // For MCQ options (A, B, C, D)
            $table->text('answer'); // Answer or correct option
            $table->text('explanation')->nullable(); // Optional explanation
            $table->integer('difficulty')->default(1); // 1-5 difficulty level
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
