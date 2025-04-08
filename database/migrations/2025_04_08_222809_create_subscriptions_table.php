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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('identifier')->unique('identifier');
            $table->string('subscription_token')->nullable();
            $table->boolean('is_recurrent')->default(false);
            $table->boolean('is_single')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->morphs('subscribable');
            $table->decimal('cost', 8, 2);
            $table->decimal('amount_paid')->nullable ();
            $table->decimal('balance')->nullable ();
            $table->tinyInteger('status');
            $table->decimal('content_owner_share')->nullable ();
            $table->decimal('platform_owner_share')->nullable ();
            $table->unsignedBigInteger('activated_by')->nullable();
            $table->text('activation_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
