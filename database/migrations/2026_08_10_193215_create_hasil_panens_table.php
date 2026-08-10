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
        Schema::create('hasil_panens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('petani_id')->constrained('petanis')->onDelete('cascade');
            $table->string('name');
            $table->string('type')->nullable();
            $table->string('grade')->nullable();
            $table->string('qty')->nullable();
            $table->string('price')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_panens');
    }
};
