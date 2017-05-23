<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
            'nickname' => 'admin',
            'phone' => '18672764673',
            'realname' => '舒立',
            'is_locked' => '0',
            'avatar' => '/uploads/content/20161219/58578d8b97780_35o.jpg',
            'created_at' => '2017-01-01 00:00:00',
            'updated_at' => '2017-01-01 00:00:00',
        ]);
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
