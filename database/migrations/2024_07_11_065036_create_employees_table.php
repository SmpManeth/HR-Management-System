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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('Employee_ID');
            $table->string('First_Name');
            $table->string('Last_Name');
            $table->string('email');
            $table->string('department');
            $table->string('employee_desgination');
            $table->string('weekday_shift')->nullable();
            $table->string('weekend_shift')->nullable();
            $table->string('total_leaves_per_month')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
