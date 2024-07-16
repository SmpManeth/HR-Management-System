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
            $table->string('Employee_ID')->required();
            $table->string('First_Name')->required();
            $table->string('Last_Name')->required();
            $table->string('Stage_name')->required();
            $table->string('email')->required();
            $table->string('dob')->required();
            $table->string('nic')->required();
            $table->string('Address')->required();
            $table->string('Contact_Number')->required();
            $table->string('employee_desgination')->required();
            $table->string('work_location')->required();
            $table->string('joined_date')->required();
            $table->string('department')->required();
            $table->string('weekday_shift')->nullable();
            $table->string('weekend_shift')->nullable();
            $table->string('total_leaves_per_month')->required();
            $table->string('status')->required();
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
