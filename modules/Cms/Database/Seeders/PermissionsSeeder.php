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

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        DB::table('permissions')->insert(array ( 
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
        
        $permissions = DB::table('permissions')->get();
        foreach ($permissions as $key => $value) {
            if (substr($value->name,0,4)=="cms.") {                
                DB::table('permission_role')->insert(array (
                    'permission_id' => $value->id,
                    'role_id' => 1,
                ));
            }
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');        
    }
}
