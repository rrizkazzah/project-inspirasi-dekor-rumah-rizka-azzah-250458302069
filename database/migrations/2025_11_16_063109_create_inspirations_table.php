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
        Schema::create('inspirations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('ruangan_id')->nullable()->constrained('ruangan')->onDelete('set null');
            $table->foreignId('tags_id')->nullable()->constrained('tags')->onDelete('set null');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('design_by', 100)->nullable();
            $table->string('area', 100)->nullable();
            $table->integer('year')->nullable();
            $table->string('country', 100)->nullable();
            $table->string('jenis_material')->nullable();
            $table->string('image_url');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
            
            $table->index('user_id');
            $table->index('ruangan_id');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspirations');
    }
};
