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
        Schema::create('treatment_key_points', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('disease_id');
            $table->string('title');
            $table->string('detailed_step');
            $table->timestamps();

            $table->foreign('disease_id')->references('id')->on('treatments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatment_key_points');
    }
};
