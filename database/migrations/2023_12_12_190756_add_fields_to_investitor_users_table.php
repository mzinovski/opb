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
            $table->longText('contract_name')->nullable();
            $table->boolean('has_signed')->default(0);
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
