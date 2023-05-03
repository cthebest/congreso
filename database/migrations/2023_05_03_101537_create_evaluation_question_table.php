<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('evaluation_question', function (Blueprint $table) {
            $table->foreignId('presentation_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('evaluation_format_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('evaluation_point_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('question_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluation_question');
    }
};
