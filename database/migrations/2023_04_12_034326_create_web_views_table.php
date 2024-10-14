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
        Schema::create('web_views', function (Blueprint $table) {
            $table->id();
            $table->string("ip_address")->nullable();
            $table->boolean("isMobile")->nullable();
            $table->string("device_name")->nullable();
            $table->integer("hits")->nullable();
            $table->string("browser")->nullable();
            $table->string("os")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_views');
    }
};
