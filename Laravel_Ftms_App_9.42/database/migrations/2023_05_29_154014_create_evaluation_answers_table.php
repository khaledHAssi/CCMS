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

        Schema::create('evaluation_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evaluation_id')->constrained();
           //// // $table->string('evaluation_id');
            // $table->foreignId('user_id');
            $table->integer('answer_type')->max('100');
            $table->string('reason');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluation_answers');
    }
};