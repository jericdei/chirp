<?php

use App\Models\Chirp;
use App\Models\User;
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
        Schema::create('user_liked_chirps', function (Blueprint $table) {
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Chirp::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_liked_chirps');
    }
};
