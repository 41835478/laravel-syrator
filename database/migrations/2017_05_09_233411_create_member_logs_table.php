<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Syrator\Data\SyratorSchema;

class CreateMemberLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        SyratorSchema::create('member_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')->comment('会员id');
            $table->integer('entity_id')->comment('操作对象id');
            $table->string('type')->comment('操作类型')->default('');
            $table->string('url')->comment('操作发起的url')->default('');
            $table->string('content')->comment('操作内容')->default('');
            $table->string('operator_ip')->comment('操作者ip')->default('');
            $table->timestamps();
            $table->softDeletes();
            
            $table->comment = '系统日志表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('member_logs');
    }
}
