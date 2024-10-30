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
        Schema::table('employees', function (Blueprint $table) {
            $table->string('Emergency_Contact_First_Name')->nullable();
            $table->string('Emergency_Contact_Last_Name')->nullable();
            $table->string('Emergency_Contact_Contact_no')->nullable();
            $table->string('Emergency_Contact_Relationship')->nullable();
            $table->string('Emergency_Contact_Address')->nullable();
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
