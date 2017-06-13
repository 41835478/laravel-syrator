<?php namespace Modules\Cms\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');

//         \DB::table('permissions')->truncate();
        
        \DB::table('permissions')->insert(array ( 
            array (
                'name' => 'cms.admin',
                'display_name' => 'CMS后台',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'cms.admin.article',
                'display_name' => '文章管理',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'cms.admin.article.article',
                'display_name' => '文章管理',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'cms.admin.article.catalog',
                'display_name' => '个人中心',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
        ));

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');        
    }
}
