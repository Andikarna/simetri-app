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
         Schema::create('cutting_record', function (Blueprint $table) {
            $table->id();
            $table->integer('copper_cutting_id');
            $table->string('ukuran');
            $table->string('quantity');
            $table->string('total'); 
            $table->integer('stok_utuh_id');
            $table->string('stok_utuh');
            $table->integer('stok_potong_id');
            $table->string('stok_potong');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
