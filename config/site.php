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

        #路由域名绑定
        'domain' => [
            'desktop' => env('DESKTOP_SITE', 'http://syrator.dev/'),
            'mobile'  => env('MOBILE_SITE', 'http://syrator.dev/'),
            'api'     => env('API_SITE', 'http://syrator.dev/'),
            'admin'   => env('ADMIN_SITE', 'http://syrator.dev/'),
            'document'=> env('DOC_SITE', 'http://syrator.dev/'),
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
            'zh-CN',
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

        #静态资源缩略别名，用于引用 路径较长 的资源，也为了方便后续静态类库的版本升级
        'alias' => [
            #基础通用样式和js
            'bootstrap.css'                 => 'assets/metronic/css/bootstrap.min.css',
            'bootstrap-responsive.css'      => 'assets/metronic/css/bootstrap-responsive.min.css',
            'font-awesome.css'              => 'assets/metronic/css/font-awesome.min.css',
            'style-metro.css'               => 'assets/metronic/css/style-metro.css',
            'style.css'                     => 'assets/metronic/css/style.css',
            'style-responsive.css'          => 'assets/metronic/css/style-responsive.css',
            'default.css'                   => 'assets/metronic/css/default.css',
            'uniform.default.css'           => 'assets/metronic/css/uniform.default.css',
            
            'jquery.js'                     => 'assets/metronic/js/jquery-1.10.1.min.js',
            'jquery-migrate.js'             => 'assets/metronic/js/jquery-migrate-1.2.1.min.js',
            'jquery-ui.custom.js'           => 'assets/metronic/js/jquery-ui-1.10.1.custom.min.js',
            'bootstrap.js'                  => 'assets/metronic/js/bootstrap.min.js',
            'jquery.slimscroll.js'          => 'assets/metronic/js/jquery.slimscroll.min.js',
            'jquery.blockui.js'             => 'assets/metronic/js/jquery.blockui.min.js',
            'jquery.cookie.js'              => 'assets/metronic/js/jquery.cookie.min.js',
            'jquery.uniform.js'             => 'assets/metronic/js/jquery.uniform.min.js',
            
            'app.js'                        => 'assets/metronic/js/app.js',

            'syrator.css'                   => 'assets/css/syrator.css',
            'syrator.js'                    => 'assets/js/syrator.js',
            
            #相关插件样式和js            
            'icheck.js'                     => 'lib/icheck-1.x/icheck.min.js',
            'icheck_all.css'                => 'lib/icheck-1.x/skins/all.css',
            'icheck_blue.css'               => 'lib/icheck-1.x/skins/square/blue.css',
            
            'ionicons.css'                  => 'lib/ionicons/css/ionicons.min.css',
            
            'html5shiv.js'                  => 'lib/html5shiv/dist/html5shiv.min.js',
            
            'respond.js'                    => 'lib/respond/dest/respond.min.js',
            
            'layer.js'                      => 'lib/layer-2.x/layer.js',
            
            'chosen.js'                     => 'lib/chosen/chosen.jquery.min.js',
            'chosen.css'                    => 'lib/chosen/chosen.css',
            
            'ckeditor.js'                   => 'lib/ckeditor/ckeditor.js',
            
            'my97datepicker.js'             => 'lib/My97DatePicker/WdatePicker.js',           
            
            'form.js'                       => 'lib/form/jquery.form.js',
            
            'jquery.dataTables.min.js'      => 'lib/datatables/jquery.dataTables.min.js',
            'dataTables.bootstrap.min.js'   => 'lib/datatables/dataTables.bootstrap.min.js',
            'dataTables.bootstrap.css'      => 'lib/datatables/dataTables.bootstrap.css',
            
            'jquery.slimscroll.min.js'      => 'lib/slimScroll/jquery.slimscroll.min.js',
            'jquery.slimscroll.js'          => 'lib/slimScroll/jquery.slimscroll.js',
            
            'fastclick.min.js'              => 'lib/fastclick/fastclick.min.js',
            'fastclick.js'                  => 'lib/fastclick/fastclick.js',
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
