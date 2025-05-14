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
        Schema::create('cacaos', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('label');
            $table->string('confidence');
            $table->string('photo');
            $table->string('caption')->nullable(true);
            $table->date('date_analyzed');
            $table->unsignedBigInteger('uploaderId');
            $table->timestamps();

            $table->foreign('uploaderId')->references('uuid')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cacaos');
    }
};
