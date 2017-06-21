<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Syrator\Data\SyratorSchema;

class CreateSystemLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        SyratorSchema::create('system_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('用户id（为0表示系统级操作，其它一般为管理型用户操作）');
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
        Schema::drop('system_logs');
    }
}
