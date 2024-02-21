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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('priority_id')->references('id')->on('priority_levels')->cascadeOnDelete();
            $table->foreignId('employee_id')->references('id')->on('employees')->cascadeOnDelete();
            $table->string('reference_number')->unique();
            $table->string('name');
            $table->mediumText('description');
            $table->date('start_date');
            $table->date('due_date');
            $table->float('reward',90,2)->default(0.00);
            $table->boolean('deadline_met')->default(0);
            $table->boolean('is_adjustable')->default(0);
            $table->enum('status',['pending','active','complete','backlog'])->default('pending');
           $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
