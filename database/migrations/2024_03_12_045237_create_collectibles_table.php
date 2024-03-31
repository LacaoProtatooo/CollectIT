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
        Schema::create('collectibles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('name');
            $table->string('description');
            $table->decimal('price', 11, 2);
            $table->longText('dimension');
            $table->string('condition');
            $table->integer('stock');
            $table->string('manufacturer');
            $table->string('category');
            $table->longText('image_path')->nullable();
            $table->string('status')->default('available');
            $table->date('release_date');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collectibles');
    }
};
