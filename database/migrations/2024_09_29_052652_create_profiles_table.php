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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('position', 255)->nullable();
            $table->string('image')->nullable();
            $table->string('fa_link')->nullable();
            $table->string('li_link')->nullable();
            $table->string('x_link')->nullable();
            $table->string('git_link')->nullable();
            $table->string('be_link')->nullable();
            $table->string('dr_link')->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('location', 255)->nullable();
            $table->string('cv_link')->nullable();
            $table->string('obj', 1000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
