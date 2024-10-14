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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // $table->string('profile_link');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('google_id')->nullable();
            $table->string('facebook_id')->nullable();
            // Added Newly
            $table->integer('digital_marketing')->nullable();
            $table->integer('content_creation')->nullable();
            $table->integer('bloging')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->text('about_me')->nullable();
            $table->text('about_work')->nullable();
            $table->string('occupation')->nullable();
            $table->string('phone')->nullable();
            // Added Newly
            $table->integer('role')->default(0);
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamp('profile_photo_updated_at')->nullable();
            $table->string('last_login')->nullable();
            $table->string('last_ip')->nullable();
            $table->string('email_sent_at')->nullable();
            $table->integer('blocked')->default(0);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
