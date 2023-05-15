<?php

use App\Models\Item;
use App\Models\Review;
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
        Schema::create('review_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Review::class)
                ->constrained();
            $table->foreignIdFor(Item::class)
                ->constrained();
            $table->string('check')->nullable();
            $table->integer('rating');
            $table->decimal('rate', 10, 2)->nullable();
            $table->decimal('value', 10, 2)->nullable();
            $table->longText('description')->nullable();
            $table->longText('conclusion')->nullable();
            $table->boolean('active')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_items');
    }
};
