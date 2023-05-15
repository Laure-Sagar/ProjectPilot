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
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('duration')->nullable();
            $table->integer('est')->nullable();
            $table->integer('lst')->nullable();
            $table->integer('eft')->nullable();
            $table->integer('lft')->nullable();
            $table->integer('slack')->nullable();
            $table->text('dependencies')->nullable();
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
        Schema::dropIfExists('tasks');
    }
};
