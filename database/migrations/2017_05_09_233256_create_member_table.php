<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Syrator\Data\SyratorSchema;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        SyratorSchema::create('member', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone')->comment('手机号')->default('');
            $table->string('email')->comment('邮箱')->default('');
            $table->string('account')->comment('账号')->default('');
            $table->string('password')->comment('密码')->default('');
            $table->string('remember_token')->comment('')->default('');
            $table->string('nickname')->comment('用户昵称')->default('');
            $table->string('role')->comment('角色')->default('');
            $table->tinyInteger('gender')->comment('性别')->default('0');
            $table->string('headimg')->comment('头像')->default('');
            $table->integer('points')->comment('会员积分')->default('0');
            $table->string('wechat_id')->comment('微信账号')->default('');
            $table->string('wechat_name')->comment('微信名称')->default('');
            $table->string('wechat_nickname')->comment('微信昵称')->default('');
            $table->string('wechat_avatar')->comment('微信头像')->default('');
            $table->string('wechat_email')->comment('微信邮箱')->default('');
            $table->string('wechat_token')->comment('微信token')->default('');
            $table->string('taobao_uid')->comment('淘宝平台用户id')->default('');
            $table->string('taobao_password')->comment('淘宝平台用户密码')->default('');
            $table->tinyInteger('is_locked')->comment('是否锁定')->default('0');
            $table->timestamps();
            $table->softDeletes();
            
            $table->comment = '会员表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('member');
    }
}
