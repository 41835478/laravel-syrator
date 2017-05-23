<?php

use Illuminate\Database\Seeder;

class WechatParamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        DB::table('wechat_params')->truncate();
        DB::table('wechat_params')->insert([
            'name' => 'app_id',
            'value' => '',
            'created_at' => '2017-01-01 00:00:00',
            'updated_at' => '2017-01-01 00:00:00',
        ]);
        
        DB::table('wechat_params')->insert([
            'name' => 'app_secret',
            'value' => '',
            'created_at' => '2017-01-01 00:00:00',
            'updated_at' => '2017-01-01 00:00:00',
        ]);
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
