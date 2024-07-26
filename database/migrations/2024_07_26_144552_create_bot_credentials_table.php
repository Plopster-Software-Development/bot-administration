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
        Schema::create('bot_credentials', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('bot_id')->index();
            $table->text('clientSecret')->unique();
            $table->string('twilioPhoneNumber')->unique()->index();
            $table->text('twilioSID')->unique();
            $table->text('twilioTK')->unique();
            $table->string('gCredsCloud')->nullable()->unique();
            $table->timestamps();

            $table->foreign('bot_id')->references('id')->on('bots')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bot_credentials');
    }
};
