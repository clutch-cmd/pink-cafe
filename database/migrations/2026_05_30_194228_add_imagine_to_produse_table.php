<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('produse', function (Blueprint $table) {
            $table->string('imagine')->nullable()->after('alergeni');
        });
    }

    public function down()
    {
        Schema::table('produse', function (Blueprint $table) {
            $table->dropColumn('imagine');
        });
    }
};