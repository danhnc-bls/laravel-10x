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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('role')->default(1)->comment('0: Admin, 1: User');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->json('avatar')->nullable()->comment('[{"name": "name_file"}, {"path": "path_file"}]');
            $table->integer('gender')->default(0)->comment('0: Male, 1: Female');
            $table->string('address')->nullable();
            $table->integer('age')->nullable();
            $table->date('birthday')->nullable();
            $table->integer('status')->default(0);

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
