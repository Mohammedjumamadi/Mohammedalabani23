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

            // الحقول الإضافية
            $table->integer('age')->nullable();
            $table->string('education')->nullable();
            $table->string('experience')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->enum('role', ['user', 'admin'])->default('user');

            // الرقم الوطني
            $table->string('national_id')->unique();

            // نوع التطوع
            $table->enum('volunteer_type', ['technical', 'physical', 'psychological', 'social', 'administrative', 'media', 'medical', 'educational']);

            $table->timestamps();
        });
    }


};
