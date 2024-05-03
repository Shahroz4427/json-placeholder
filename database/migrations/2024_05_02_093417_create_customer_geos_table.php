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
        Schema::create('customer_geos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_address_id');
            $table->foreign('customer_address_id')->references('id')->on('customer_addresses')->onDelete('cascade');
            $table->string('lat');
            $table->string('lng');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_geos');
    }
};
