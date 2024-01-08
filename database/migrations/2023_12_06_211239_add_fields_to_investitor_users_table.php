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
        Schema::table('investitor_users', function (Blueprint $table) {
            $table->integer('invest_step')->nullable();
            $table->boolean('has_payed')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('investitor_users', function (Blueprint $table) {
            //
        });
    }
};
