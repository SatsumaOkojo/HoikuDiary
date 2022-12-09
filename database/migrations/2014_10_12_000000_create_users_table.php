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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('facility_id');
            $table->unsignedBigInteger('position_id');
            $table->string('name');
            $table->string('mail')->unique();
            $table->timestamp('mail_verified_at')->nullable();
            $table->string('password');
            $table->string('icon_image_path');
            $table->softDeletes('delete_at');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
