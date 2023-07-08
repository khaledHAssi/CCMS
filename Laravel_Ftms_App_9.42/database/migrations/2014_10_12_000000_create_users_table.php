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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone');
            $table->string('username')->unique();
            $table->string('image')->nullable();
            $table->boolean('status')->default(1);
            $table->enum('type', ['student', 'companyManager', 'companySupervisor', 'doctor', 'super-admin'])->default('student');
            $table->foreignId('company_id')->nullable()->constrained();
            $table->string('channels',50)->default('database,broadcast');
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
