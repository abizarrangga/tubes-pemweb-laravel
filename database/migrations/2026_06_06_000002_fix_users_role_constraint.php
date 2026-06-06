<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::getConnection()->getDriverName() !== 'sqlite') {
            DB::statement("ALTER TABLE users MODIFY role ENUM('user', 'admin', 'superadmin') NOT NULL DEFAULT 'user'");

            return;
        }

        Schema::create('users_temp', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['user', 'admin', 'superadmin'])->default('user');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::statement('INSERT INTO users_temp (id, name, email, email_verified_at, password, role, remember_token, created_at, updated_at)
            SELECT id, name, email, email_verified_at, password, role, remember_token, created_at, updated_at FROM users');

        Schema::drop('users');
        Schema::rename('users_temp', 'users');
    }

    public function down(): void
    {
        if (Schema::getConnection()->getDriverName() !== 'sqlite') {
            DB::statement("ALTER TABLE users MODIFY role ENUM('admin', 'superadmin') NOT NULL DEFAULT 'admin'");

            return;
        }

        Schema::create('users_temp', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'superadmin'])->default('admin');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::statement("INSERT INTO users_temp (id, name, email, email_verified_at, password, role, remember_token, created_at, updated_at)
            SELECT id, name, email, email_verified_at, password, role, remember_token, created_at, updated_at
            FROM users WHERE role IN ('admin', 'superadmin')");

        Schema::drop('users');
        Schema::rename('users_temp', 'users');
    }
};
