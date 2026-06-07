<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    // Verifică dacă coloana există deja. Dacă nu există, o creează; dacă există, trece peste fără eroare!
    if (!Schema::hasColumn('produse', 'imagine')) {
        Schema::table('produse', function (Blueprint $table) {
            $table->string('imagine')->nullable()->after('alergeni');
        });
    }
}

    public function down()
    {
        Schema::table('produse', function (Blueprint $table) {
            $table->dropColumn('imagine');
        });
    }
};