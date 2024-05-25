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
        Schema::table('buku',function (Blueprint $table){
            $table->unsignedBigInteger('bahasa_id')->nullable();
            $table->foreign('bahasa_id')->references('id')->on('bahasa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bahasa',function(Blueprint $table){
            $table->string('bahasa');
            $table->dropForeign(['bahasa_id']);
        });
    }
};
