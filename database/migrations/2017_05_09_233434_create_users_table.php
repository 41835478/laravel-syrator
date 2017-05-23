<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Syrator\Data\SyratorSchema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        SyratorSchema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->comment('用户名')->default('');
            $table->string('email')->comment('邮箱')->default('');
            $table->string('password')->comment('密码')->default('');
            $table->string('remember_token')->comment('token')->default('');
            $table->string('nickname')->comment('昵称')->default('');
            $table->string('phone')->comment('电话')->default('');
            $table->string('realname')->comment('真实姓名')->default('');
            $table->tinyInteger('is_locked')->comment('1锁定,0正常')->default('0');
            $table->string('avatar')->comment('头像')->default('');
            $table->timestamps();
            
            $table->comment = '用户表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
