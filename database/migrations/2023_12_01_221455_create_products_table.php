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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('merk')->nullable();
            $table->string('manufacture')->nullable();
            $table->integer('category');
            $table->integer('type');
            $table->decimal('selling_price', 16, 6)->nullable();
            $table->text('description')->nullable();
            $table->enum('type_research', ['parallel', 'basic']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
