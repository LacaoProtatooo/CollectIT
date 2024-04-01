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
        Schema::create('collectible_order', function (Blueprint $table) {
            $table->unsignedBiginteger('order_id');
            $table->unsignedBiginteger('collectible_id');
            $table->integer('quantity');
            $table->string('reviewStat');

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('collectible_id')->references('id')->on('collectibles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('collectible_order', function(Blueprint $table){
            $table->dropColumn('order_id');
            $table->dropColumn('collectible_id');
        });
    }
};
