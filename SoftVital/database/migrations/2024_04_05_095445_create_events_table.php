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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
=======
            $table->foreignId('user_id')->constrained('users');
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
            $table->string('title');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->enum('status', ['active', 'inactive'])->default('active');
            
            $table->enum('type', ['travail', 'evenement']);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
