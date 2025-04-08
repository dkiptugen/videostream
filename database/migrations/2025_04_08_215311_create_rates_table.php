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
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->morphs('ratable');
            $table->string('name');
            $table->decimal('cost')->nullable();
            $table->string('reserved_currency')->nullable();
            $table->decimal('reserved_currency_cost')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->boolean('subscribable');
            $table->dateTime('rate_from')->nullable();
            $table->dateTime('rate_to')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rates');
    }
};
