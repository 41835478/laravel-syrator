<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Syrator\Data\SyratorSchema;

class CreateThemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        SyratorSchema::create('theme', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('主题名称')->default('');
            $table->string('code')->comment('主题编码')->default('');
            $table->string('author')->comment('主题作者')->default('');
            $table->string('description')->comment('主题描述')->default('');
            $table->string('version')->comment('主题版本')->default('');
            $table->tinyInteger('is_current')->comment('是否设为当前主题')->default('0');
            $table->timestamps();
            $table->softDeletes();
            
            $table->comment = '系统模板表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('theme');
    }
}
