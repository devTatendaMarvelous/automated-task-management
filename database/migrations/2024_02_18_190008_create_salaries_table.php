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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->references('id')->on('employees')->cascadeOnDelete();
            $table->string('month');
            $table->float('gross_salary',90,2)->default(0.00);
            $table->float('deductions',90,2)->default(0.00);
            $table->float('bonuses',90,2)->default(0.00);
            $table->float('net_salary',90,2)->default(0.00);
            $table->softDeletes();
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
