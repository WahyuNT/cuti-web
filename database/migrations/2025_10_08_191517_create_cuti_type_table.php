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
        Schema::create('cuti_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('deskripsi')->nullable();
            $table->integer('kuota')->nullable();
            $table->enum('status', ['active', 'inactive']);
            $table->boolean('is_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuti_type');
    }
};
