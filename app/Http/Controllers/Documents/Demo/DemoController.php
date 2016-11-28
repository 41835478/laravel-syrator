<?php

namespace App\Http\Controllers\Documents\Demo;

use App\Http\Controllers\Documents\DocumentsController;

/**
 * 开发演示控制器
 *
 */
class DemoController extends DocumentsController
{

    /**
     * 推荐位属性
     */
    protected $flags = [
        'l' => '可用于友情链接',
        'f' => '可用于页面幻灯片模型',
        's' => '可用于页面滚动效果的文章',
        'h' => '可用于页面推荐性文章',
    ];

    /**
     * 分类演示
     */
    protected $categories = [
        'test'        => '测试',
        'development' => '开发',
        'news'        => '新闻',
        'document'    => '文档',
    ];

    public function getForm()
    {
        $flag = 'f,h';
        $is_locked = 1;
        $categories = $this->categories;
        return $this->view('demo.form', compact('flag', 'is_locked', 'categories'));
    }

    public function getIcon()
    {
        return $this->view('demo.icon');
    }
}
