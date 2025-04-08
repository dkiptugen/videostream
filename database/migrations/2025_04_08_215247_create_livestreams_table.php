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
        Schema::create('livestreams', function (Blueprint $table) {
            $table->id();
            $table->ulid('identifier')->index();
            $table->string('slug')->unique();
            $table->string('title');
            $table->longText('description');
            $table->string('thumbnail_url');
            $table->string('stream_key')->unique();
            $table->text('stream_url');
            $table->text('stream_video_link');
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->morphs('ownerable');
            $table->string('country');
            $table->string('language');
            $table->tinyInteger ('status')->default(0);
            $table->boolean('is_premium')->default(false);
            $table->boolean('is_geopolled')->default(false);
            $table->json("geo_data")->nullable();
            $table->json('livestream_metadata');
            $table->timestamps();
            $table->softDeletes ();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livestreams');
    }
};
