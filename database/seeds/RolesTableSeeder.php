<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        \DB::table('roles')->truncate();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'display_name' => '超级管理员',
                'description' => '系统超级管理员，负责系统的参数配置，权限设置等工作',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Manager',
                'display_name' => '业务管理员',
                'description' => '系统业务管理员，负责系统的业务管理，比如内容上的管理，流程上的管理，会员的管理，客服等',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
        ));

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');        
    }
}
