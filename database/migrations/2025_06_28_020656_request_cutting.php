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
        // Schema::create('copper_cutting_lists', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('production_code', 50);
        //     $table->string('project_code', 50);
        //     $table->string('project_name');
        //     $table->string('panel_name');
        //     $table->string('busbar_type');
        //     $table->string('dimension', 20); 
        //     $table->integer('length');
        //     $table->integer('quantity');
        //     $table->integer('total_length');
        //     $table->date('production_date');
        //     $table->timestamps();
        // });

        // Schema::create('copper_cutting_summary', function (Blueprint $table) {
        //     $table->id();
        //     $table->bigint('copper_cutting_id');
        //     $table->string('dimension', 20);
        //     $table->integer('quantity');
        //     $table->integer('total_length');
        //     $table->timestamps();
        // });

        Schema::create('copper_cutting_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('copper_cutting_id');
            $table->string('panel_name');
            $table->string('busbar_type');
            $table->string('dimension'); 
            $table->integer('length');
            $table->integer('quantity');
            $table->integer('total_length');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('copper_cutting_summary');
        // Schema::dropIfExists('copper_cutting_lists');
    }
};
