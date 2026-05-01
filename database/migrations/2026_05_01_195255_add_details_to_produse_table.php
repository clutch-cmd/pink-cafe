<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('produse', function (Blueprint $table) {
        $table->text('descriere')->nullable()->after('categorie');
        $table->string('ingrediente')->nullable()->after('descriere');
        $table->string('alergeni')->nullable()->after('ingrediente');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produse', function (Blueprint $table) {
            //
        });
    }
};
