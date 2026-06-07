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
            $table->foreignId('produs_id')->nullable()->constrained('produse')->onDelete('set null');
            $table->string('optiune_lapte')->nullable();
            $table->json('toppings')->nullable();
            $table->date('data_rezervare')->nullable();
            $table->time('ora_rezervare')->nullable();
            $table->text('mentiuni_speciale')->nullable();
            $table->decimal('pret_total', 8, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comenzi', function (Blueprint $table) {
            $table->dropForeign('comenzi_produs_id_foreign');
            $table->dropColumn([
                'produs_id',
                'optiune_lapte',
                'toppings',
                'data_rezervare',
                'ora_rezervare',
                'mentiuni_speciale',
                'pret_total',
            ]);
        });
    }
};
