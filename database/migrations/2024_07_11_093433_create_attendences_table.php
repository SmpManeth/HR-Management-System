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
        Schema::create('attendences', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->date('date')->nullable();
            $table->time('check_in')->nullable();
            $table->time('check_out')->nullable();
            $table->string('shift')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * 
     *           
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendences');
    }
};
