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
        Schema::create('petanis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->string('whatsapp')->nullable();
            $table->string('location')->nullable();
            $table->string('area')->nullable();
            $table->string('cert')->nullable();
            $table->text('desc')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petanis');
    }
};
