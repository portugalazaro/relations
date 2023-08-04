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
        Schema::table('addresses', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')      
                ->on('users')
                ->onDelete('SET NULL');

                // onDelete('SET NULL') -> possibilita a exclusão do endereço que pode estar relacionado
                // com outro, ele vai apagar o endereço e onde tem relacionamento ele vai mudar o valor para null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropForeign('user_id');
        });
    }
};
