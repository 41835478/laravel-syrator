<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Syrator\Data\SyratorSchema;

class CreateWechatParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        SyratorSchema::create('wechat_params', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('微信接口配置选项名');
            $table->text('value')->comment('微信接口配置选项值')->default('');
            $table->timestamps();
            $table->softDeletes();
            
            $table->comment = '微信接口配置表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('wechat_params');
    }
}
