<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Syrator\Data\SyratorSchema;

class CreateAppGuideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        SyratorSchema::create('app_guide', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('导航页名称')->default('');
            $table->string('url')->comment('导航页图片url')->default('');
            $table->string('description')->comment('描述')->default('');
            $table->tinyInteger('sort_num')->comment('排序序号')->default('0');
            $table->tinyInteger('is_show')->comment('是否展示')->default('1');
            $table->timestamps();
            
            $table->comment = '移动端启动欢迎页配置';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('app_guide');
    }
}
