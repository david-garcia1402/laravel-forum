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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('support_id');
            $table->unsignedBigInteger('user_id_answer');
            $table->unsignedBigInteger('user_id_support');
            $table->text('answer');
            $table->timestamps();

            $table->foreign('user_id_support')->references('id')->on('users');
            $table->foreign('user_id_answer')->references('id')->on('users');
            $table->foreign('support_id')->references('id')->on('supports');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
