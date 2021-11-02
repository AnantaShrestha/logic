<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('admin_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 100)->unique();
            $table->string('password', 60);
            $table->string('name', 100);
            $table->string('email', 150)->unique();
            $table->string('avatar', 255)->nullable();
            $table->tinyInteger('activate')->default(1);
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
        });
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('slug', 50)->unique();
            $table->timestamps();
        });
        Schema::create('admin_role', function (Blueprint $table) {
            $table->integer('role_id');
            $table->integer('admin_id');
            $table->index(['role_id', 'admin_id']);
            $table->timestamps();
        });
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->string('slug', 50)->unique();
            $table->text('http_uri')->nullable();
            $table->timestamps();
        });
        Schema::create('role_permission', function (Blueprint $table) {
            $table->integer('role_id');
            $table->integer('permission_id');
            $table->index(['role_id', 'permission_id']);
            $table->timestamps();
            $table->primary(['role_id', 'permission_id']);
        });
        Schema::create('admin_permission', function (Blueprint $table) {
            $table->integer('admin_id');
            $table->integer('permission_id');
            $table->index(['admin_id', 'permission_id']);
            $table->timestamps();
            $table->primary(['admin_id', 'permission_id']);
        });
        Schema::create('admin_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0);
            $table->integer('sort')->default(0);
            $table->string('title', 100);
            $table->string('icon', 50)->nullable();
            $table->string('uri', 255)->nullable();
            $table->timestamps();
        });
        Schema::create('admin_log', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->string('path');
            $table->string('method', 10);
            $table->string('ip');
            $table->string('user_agent')->nullable();
            $table->text('input');
            $table->index('admin_id');
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
        Schema::dropIfExists('admin_user');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('admin_role');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('role_permission');
        Schema::dropIfExists('admin_permission');
        Schema::dropIfExists('admin_menu');
        Schema::dropIfExists('admin_log');

    }
}