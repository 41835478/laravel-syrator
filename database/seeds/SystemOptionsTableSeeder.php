<?php

use Illuminate\Database\Seeder;

class SystemOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        DB::table('system_options')->truncate();
        DB::table('system_options')->insert([
            ['name' => 'version_code','value' => '1','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
            ['name' => 'version_name','value' => '1.1.1','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
            ['name' => 'version_log','value' => '第一版本','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
            
            ['name' => 'website_title','value' => 'Syrator','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
            ['name' => 'website_keywords','value' => 'syrator,laravel','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
            ['name' => 'website_description','value' => '本系统是一套业务框架系统，集成了一些常用的业务模块','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
            ['name' => 'website_icp','value' => '鄂ICP备15009849号-1','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
            
            ['name' => 'author_name','value' => 'SHL','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
            ['name' => 'author_url','value' => 'https://syrator.com','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],

            ['name' => 'organization_fullname','value' => 'Syrator','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
            ['name' => 'organization_nickname','value' => 'Syrator','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
            ['name' => 'organization_telephone','value' => '400-000-000','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
            ['name' => 'organization_address','value' => '中国','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
        ]);
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
