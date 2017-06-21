<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Syrator\Data\SyratorSchema;

class CreateSmsLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        SyratorSchema::create('sms_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone')->comment('手机号')->default('');
            $table->string('type')->comment('操作类型')->default('');
            $table->string('url')->comment('操作发起的url')->default('');
            $table->string('content')->comment('操作内容')->default('');
            $table->string('vcode')->comment('验证码')->default('');
            $table->string('res')->comment('短信平台返回码')->default('');
            $table->string('operator_ip')->comment('操作者ip')->default('');
            $table->timestamps();
            $table->softDeletes();
            
            $table->comment = '短信验证码明细表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sms_logs');
    }
}
