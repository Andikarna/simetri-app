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
         Schema::create('buy_copper', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->string('no_sppt');
            $table->string('no');
            $table->string('item_number'); 
            $table->string('item_description');
            $table->string('merk');
            $table->integer('required');
            $table->string('uo');
            $table->timestamp('expired_date');
            $table->string('description');
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
