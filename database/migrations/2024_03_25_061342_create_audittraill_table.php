<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('audittrail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('user_type');
            $table->string('activity_name');
            $table->text('activity_details');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('audittrail');
    }
};
