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
        Schema::create('my_project', function (Blueprint $table) {
            $table->id();
            $table->string('project_name', 50);
            $table->string('project_description', 50);
            $table->string('project_link', 50);
            $table->string('project_technology', 50)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('project_image', 255)->nullable();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_project');
    }
};
