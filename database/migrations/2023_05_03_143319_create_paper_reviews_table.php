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
        Schema::create('paper_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('evaluation_format_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('presentation_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('thematic_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('general_evaluation', ['aceptado', 'aceptado con modificaciones', 'no es aceptado']);
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paper_reviews');
    }
};
