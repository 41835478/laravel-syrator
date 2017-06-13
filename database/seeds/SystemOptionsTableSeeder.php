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
            ['name' => 'website_keywords','value' => 'syrator','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
            ['name' => 'company_address','value' => '','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
            ['name' => 'website_title','value' => 'Syrator','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
            ['name' => 'company_telephone','value' => '400-6178-827','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
            ['name' => 'company_full_name','value' => 'Syrator','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
            ['name' => 'website_icp','value' => '鄂ICP备15009849号-1','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
            ['name' => 'system_version','value' => '1.1','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
            ['name' => 'page_size','value' => '10','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
            ['name' => 'system_logo','value' => '','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
            ['name' => 'picture_watermark','value' => '','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
            ['name' => 'company_short_name','value' => 'Syrator','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
            ['name' => 'system_author','value' => 'SHL','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
            ['name' => 'system_author_website','value' => 'http://syrator.com','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00'],
            ['name' => 'is_watermark','value' => '0','created_at' => '2017-01-01 00:00:00', 'updated_at' => '2017-01-01 00:00:00']
        ]);
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
