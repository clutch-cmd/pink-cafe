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
        Schema::table('comenzi', function (Blueprint $table) {
            $table->json('optiuni_extra')->nullable()->after('toppings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comenzi', function (Blueprint $table) {
            $table->dropColumn('optiuni_extra');
        });
    }
};