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
        Schema::table('itemrequest', function (Blueprint $table) {
            $table->unsignedBigInteger('useritem_id')->nullable();
            $table->foreign('useritem_id')->references('id')->on('itemusers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('itemrequest', function (Blueprint $table) {
            //
        });
    }
};
