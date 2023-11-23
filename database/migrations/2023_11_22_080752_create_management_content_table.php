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
        Schema::create('management_content', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_produk')->nullable();
            $table->unsignedBigInteger('id_makeup')->nullable();
            $table->integer('active');
            $table->timestamps();
            $table->foreign('id_makeup')->references('id')->on('makeup')
                ->onDelete('cascade');
            $table->foreign('id_produk')->references('id')->on('data_produk')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('management_content');
    }
};
