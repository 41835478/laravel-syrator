<?php

use Illuminate\Database\Seeder;

class MemberRanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        DB::table('member_rank')->truncate();
        DB::table('member_rank')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => '普通会员',
                'description' => '普通会员',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
        ));
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
