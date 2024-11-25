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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            // إضافة الحقول الجديدة
            $table->integer('age')->nullable(); // العمر
            $table->string('education')->nullable(); // المستوى التعليمي
            $table->string('experience')->nullable(); // الخبرة أو المهنة
            $table->string('address')->nullable(); // العنوان
            $table->string('phone')->nullable(); // رقم الهاتف

            // إضافة الحقل gender
            $table->enum('gender', ['male', 'female'])->nullable(); // الجنس

            // إضافة عمود role
            $table->enum('role', ['user', 'admin'])->default('user'); // دور المستخدم

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
