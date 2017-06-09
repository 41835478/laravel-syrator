<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Syrator\Data\SyratorSchema;

class ArticleSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        SyratorSchema::create('article_catalog', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('名称')->default('');
            $table->string('keywords')->comment('关键词')->default('');
            $table->string('description')->comment('描述')->default('');
            $table->tinyInteger('sort_num')->comment('排序序号')->default('0');
            $table->tinyInteger('is_show')->comment('是否展示')->default('0');
            $table->smallInteger('pid')->comment('父类id');
            $table->timestamps();
            
            $table->comment = '文章分类表';
        });
        
        SyratorSchema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('catalog_id')->comment('所属分类')->default('0');
            $table->string('name')->comment('标题')->default('');
            $table->string('keywords')->comment('关键词')->default('');
            $table->text('summary')->comment('摘要')->default('');
            $table->string('thumb')->comment('缩略图')->default('');            
            $table->text('content')->comment('详情')->default('');            
            $table->timestamps();
        
            $table->comment = '文章表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('article_catalog');
        Schema::drop('article');
    }
}
