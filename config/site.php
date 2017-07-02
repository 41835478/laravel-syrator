<?php

/**
 * 多站点 域名、路由、静态资源、存储CDN 等相关配置
 *
 */

return [

    // 路由相关配置
    'route' => [

        #路由站点分组(对应block中间件参数)
        'group' => [
            'desktop',
            'mobile',
            'api',
            'admin',
            'document',
        ],

        #路由前缀绑定
        'prefix' => [
            'desktop' => '',
            'mobile'  => 'mobile',
            'api'     => 'api',
            'admin'   => 'admin',
            'document'=> 'documents',
        ],
    ],
    
    // 站点样式
    'theme' => 'desktop',
    
    // 站点多语言设置
    'lang' => [
        'desktop' => [
            'zh-cn',
            'en',
        ],
    ],

    // 静态资源相关配置
    'asset' => [

        #站点对应的静态资源目录
        'directory' => [
            'desktop' => 'assets',
            'admin'   => 'back',
            'document'     => 'vendor/mdoc',
        ],

        #目录描述性文字
        'description' => [
            'assets'  => 'desktop site (frontend) public assets',
            'back'    => 'admin site (backend) public assets',
            'lib'     => 'common public library assets',
            'vendor'  => 'third-party vendor public assets',
        ],

        #静态资源CDN配置
        'cdn' => [
            //'on' or 'off'
            'status'  => 'on',
            'url'     => '//localhost:8801/',

            #匹配所有资源路径:
            //'pattern' => '/.*/i',
            #仅匹配 `lib/` 打头的资源路径:
            'pattern' => '/^lib\/.*/i',
        ],

    ],

    // 文件存储相关配置(留作以后扩展)
    'storage' => [

        #本地文件存储目录
        'directory' => [
            'uploads',
        ],

        #目录描述性文字
        'description' => [
            'uploads' => 'path for user uploaded files',
        ],

        #远端云文件存储配置
        'cdn' => [
            //'on' or 'off'
            'status' => 'on',
            'url'    => 'http://7oxfn9.com1.z0.glb.clouddn.com/',
        ],
    ],

];
