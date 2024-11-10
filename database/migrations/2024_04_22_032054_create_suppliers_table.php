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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name');
            $table->string('supplier_contact');
            $table->string('supplier_email')->unique();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('itemcategories')->onDelete('cascade');
            $table->string('supplier_owner');
            $table->string('supplier_address');
            $table->string('supplier_city');
            $table->string('supplier_tin');
            $table->string('supplier_bp');
            $table->string('supplier_jepscert');
            $table->string('supplier_myrp');
            $table->string('supplier_philcert');
            $table->tinyInteger('status')->default('0')->comment('0=visible,1=hidden');
            $table->text('supplier_remark');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
