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
            if (!Schema::hasColumn('comenzi', 'mentiuni')) {
                $table->text('mentiuni')->nullable()->after('mentiuni_speciale');
            }
            if (!Schema::hasColumn('comenzi', 'user_id')) {
                $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null')->after('id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comenzi', function (Blueprint $table) {
            $table->dropColumn(['mentiuni', 'user_id']);
        });
    }
};