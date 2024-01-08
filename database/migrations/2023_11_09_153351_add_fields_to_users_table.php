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
        Schema::table('users', function (Blueprint $table) {
            $table->longText('surname')->nullable();
            $table->date('dob')->nullable();
            $table->longText('id_card_number')->nullable();
            $table->longText('embg')->nullable();
            $table->longText('address')->nullable();
            $table->longText('id_card_picture_front')->nullable();
            $table->longText('id_card_picture_back')->nullable();
            $table->longText('bank_account')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
