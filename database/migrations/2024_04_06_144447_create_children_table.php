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
        Schema::create('children', function (Blueprint $table) {
            $table->id('child_id');
            $table->string('username')->default('oussama')->nullable(false);
            $table->string('age')->default('10')->nullable(false);
            $table->string('nivScolaire', 100)->default('cp')->nullable(false);
            $table->unsignedBigInteger('parent_id')->nullable(false); // Make parent_id non-nullable
            $table->foreign('parent_id')->references('parent_id')->on('parents')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('children');
    }
};