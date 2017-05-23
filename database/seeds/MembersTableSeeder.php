<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        DB::table('member')->truncate();
        DB::table('member')->insert(array (
            0 =>
            array (
                'id' => 1,
                'phone' => '18986098726',
                'email' => '',
                'account' => '18986098726',
                'password' => '$2y$10$j9MCnxVQt6tW8HIq9Ag2B.3hJXjPzXRq/vPW2PYI/aEbRgj9s4swO',
                'remember_token' => 'pwW2JYAhLPQvGDlKswtnDipcs6xCQMhMvKyMnRtB448XwKSpxeeCsd55Y4rr',
                'nickname' => '小胖',
                'role' => '0',
                'gender' => 0,
                'headimg' => 'http://wx.qlogo.cn/mmopen/NKniblronia5pRIhTsByxCstYkdqNKYDOicxicsL9o1v9sNdMIdt8JpBgHicrXVicVtousLSHwOb2hI4iaYVCtYtFKot4CgFhTGjBrX/0',
                'points' => 0,
                'wechat_id' => 'oLiw-w2A-l8_M9jbR7tPyrO9c16k',
                'wechat_name' => '小胖',
                'wechat_nickname' => '小胖',
                'wechat_avatar' => 'http://wx.qlogo.cn/mmopen/NKniblronia5pRIhTsByxCstYkdqNKYDOicxicsL9o1v9sNdMIdt8JpBgHicrXVicVtousLSHwOb2hI4iaYVCtYtFKot4CgFhTGjBrX/0',
                'wechat_email' => '',
                'wechat_token' => '-1RBiolbUXLXSDO29fiKFNGvqtFSg-5pZ_aXSKKZb01BjlzqI0hI3FDNeg17nDgDx5-1f2fQfy4pV7_bNEILPdsykmn-3RkNias4slPAbRA',
                'taobao_uid' => '18986098726',
                'taobao_password' => '$2y$10$p4EDWiv5v8wu4GU/3CR8LOCsZ47aGa6Xl03UGWkNXWg2To5u1Vhee',
                'is_locked' => 0,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            1 =>
            array (
                'id' => 2,
                'phone' => '18672764673',
                'email' => '',
                'account' => '18672764673',
                'password' => '$2y$10$WhK0hrDsqBYz4oAe2BvQdeX/PJwQshg8OfmcWQUZzpgN7WMCg9eN2',
                'remember_token' => '',
                'nickname' => 'Satyr',
                'role' => '0',
                'gender' => 0,
                'headimg' => 'http://wx.qlogo.cn/mmopen/hNWCQ9bibbzG9LHZlqrUN9GfaTCWGgniaZiaxIMMoSfLFAZkzribesiazDic6ianbmW4tstCFYQr9o7llSiciaibJGmYJiayg/0',
                'points' => 0,
                'wechat_id' => 'oLiw-w5AGEV-8erDdwk7PzibHQZ4',
                'wechat_name' => 'Satyr',
                'wechat_nickname' => 'Satyr',
                'wechat_avatar' => 'http://wx.qlogo.cn/mmopen/hNWCQ9bibbzG9LHZlqrUN9GfaTCWGgniaZiaxIMMoSfLFAZkzribesiazDic6ianbmW4tstCFYQr9o7llSiciaibJGmYJiayg/0',
                'wechat_email' => '',
                'wechat_token' => 'ujK17F3EqrUeZm6qfcnBTgJW0pTPCGYrHf2WcE9YA3frNXfuGDkN09YI1yUleYAsg30Io9eWvlX7RHaauJrinimLrqhoZiXt8HoK75LggnA',
                'taobao_uid' => '18672764673',
                'taobao_password' => '$2y$10$zfz3.mJF2/JrJ.kv2Ons4.pcyQvcPIzPgsN2D0sRgViAq68j2WXhq',
                'is_locked' => 0,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
        ));
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
