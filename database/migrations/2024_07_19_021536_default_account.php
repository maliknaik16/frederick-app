<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
//        Schema::table('users', function (Blueprint $table) {
//            $table->unique('email');
//        });

        \App\Models\User::query()->insert([
            [
                'name' => 'test user',
                'email' => 'test@example.com',
                'password' => Hash::make('1234'),
                'created_at' => now(),
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \App\Models\User::query()->delete();
    }
};
