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
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('street');
            $table->string('house');
            $table->string('building')->nullable();
            $table->string('liter')->nullable();
            $table->string('floors')->nullable();
            $table->string('entrances')->nullable();
            $table->string('improvement')->nullable();
            $table->string('organization');
            $table->longText('description')->nullable();
            $table->boolean('active')->nullable();
            // $table->decimal('latitude', 12, 8)->nullable();
            // $table->decimal('longitude', 12, 8)->nullable();


            $table->float('latitude', 12, 8)->nullable();
            $table->float('longitude', 12, 8)->nullable();
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buildings');
    }
};
