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
        Schema::create('salary_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->references('id')->on('tasks')->cascadeOnDelete();
            $table->float('deduction',90,2)->default(0.00);
            $table->float('bonus',90,2)->default(0.00);
            $table->float('reward',90,2)->default(0.00);
            $table->boolean('is_paid')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_tasks');
    }
};
