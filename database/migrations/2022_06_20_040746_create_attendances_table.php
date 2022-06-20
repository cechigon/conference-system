<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conferences_id');
            $table->unsignedBigInteger('users_id');
            $table->boolean('father');
            $table->boolean('mother');
            $table->boolean('other');
            $table->boolean('entry');
            $table->timestamp('entry_at', 0)->nullable();
            $table->boolean('attendance');
            $table->timestamp('attendance_at', 0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
};
