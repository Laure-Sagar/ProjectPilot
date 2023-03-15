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
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('earliest_start_date')->nullable();
            $table->string('earliest_finish_date')->nullable();
            $table->string('latest_start_date')->nullable();
            $table->string('latest_finish_date')->nullable();
            $table->integer('task_duration')->nullable();
            $table->text('dependencies_board')->nullable();
            $table->string('status')->nullable();
            $table->string('project_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boards');
    }
};
