<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 先导入配置
        $this->call('SystemOptionsTableSeeder');
        $this->call('WechatParamsTableSeeder');
        
        // 系统用户
        $this->call('UsersTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('RoleUserTableSeeder');
        // 用户权限
        $this->call('PermissionsTableSeeder');
        $this->call('PermissionRoleTableSeeder');
        
        // 会员
        $this->call('MembersTableSeeder');
    }
}
