<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        \DB::table('permissions')->truncate();
        
        \DB::table('permissions')->insert(array ( 
            array (
                'name' => 'admin',
                'display_name' => '后台',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.home',
                'display_name' => '后台控制台',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.mine',
                'display_name' => '个人中心',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.mine.inforation',
                'display_name' => '个人中心',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.mine.avatar',
                'display_name' => '修改个人头像',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.mine.password',
                'display_name' => '修改个人密码',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.system',
                'display_name' => '系统管理',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.system.cache',
                'display_name' => '重建缓存',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.system.option',
                'display_name' => '参数配置',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.system.log',
                'display_name' => '系统日志',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.system.log.show',
                'display_name' => '查看系统日志详情',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.system.theme',
                'display_name' => '板块管理',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.system.theme.create',
                'display_name' => '新增板块',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.system.theme.edit',
                'display_name' => '编辑板块',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.system.theme.show',
                'display_name' => '查看板块详情',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.system.theme.remove',
                'display_name' => '删除板块',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.system.feedback',
                'display_name' => '意见反馈',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.system.feedback.show',
                'display_name' => '查看意见反馈详情',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.system.feedback.reply',
                'display_name' => '回复意见反馈',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.system.appinfo',
                'display_name' => 'APP管理',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.system.appinfo.guide',
                'display_name' => 'APP欢迎页管理',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.system.appinfo.guide.create',
                'display_name' => '新增APP欢迎页',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.system.appinfo.guide.store',
                'display_name' => '更新APP欢迎页',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.system.appinfo.guide.remove',
                'display_name' => '删除APP欢迎页',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.permission',
                'display_name' => '权限管理',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.permission.user',
                'display_name' => '管理员管理',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.permission.user.create',
                'display_name' => '新建管理员',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.permission.user.edit',
                'display_name' => '编辑管理员',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.permission.user.show',
                'display_name' => '查看管理员',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.permission.user.remove',
                'display_name' => '删除管理员',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.permission.role',
                'display_name' => '角色管理',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.permission.role.create',
                'display_name' => '新增角色',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.permission.role.edit',
                'display_name' => '编辑角色',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.permission.role.show',
                'display_name' => '查看角色',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.permission.role.remove',
                'display_name' => '删除角色',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.permission.permission',
                'display_name' => '权限管理',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.permission.permission.create',
                'display_name' => '新建权限',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.permission.permission.edit',
                'display_name' => '编辑权限',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.permission.permission.show',
                'display_name' => '查看权限',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.permission.permission.remove',
                'display_name' => '删除权限',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.member',
                'display_name' => '会员管理',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.member.member',
                'display_name' => '会员管理',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.member.member.create',
                'display_name' => '新增会员',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.member.member.edit',
                'display_name' => '编辑会员',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.member.member.show',
                'display_name' => '产看会员',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.member.member.remove',
                'display_name' => '删除会员',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.member.group',
                'display_name' => '会员分组',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.member.group.create',
                'display_name' => '新增会员分组',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.member.group.edit',
                'display_name' => '编辑会员分组',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.member.group.show',
                'display_name' => '查看会员分组',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.member.group.remove',
                'display_name' => '删除会员分组',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'admin.member.certificate',
                'display_name' => '会员审核',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'wechat.admin',
                'display_name' => '微信公众号',
                'description' => '微信公众号后台管理',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'name' => 'wechat.admin.params',
                'display_name' => '微信公众号接口设置',
                'description' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
        ));

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');        
    }
}
