<?php

namespace App\Repositories;

use App\Model\UserModel;
use App\Model\RoleModel;

use DB;

/**
 * 用户仓库UserRepository
 *
 */
class UserRepository extends BaseRepository
{
    /**
     * The Role instance.
     *
     * @var App\Model\RoleModel
     */
    protected $role;

    /**
     * Create a new UserRepository instance.
     *
     * @param  App\Model\UserModel $user
     * @param  App\Model\RoleModel $role
     * @return void
     */
    public function __construct(UserModel $user, RoleModel $role)
    {
        $this->model = $user;
        $this->role = $role;
    }

    /**
     * 存储管理员
     *
     * @param  App\Model\UserModel $manager
     * @param  array $inputs
     * @return App\Model\UserModel
     */
    private function saveManager($manager, $inputs)
    {
        $manager->username = $manager->nickname = e($inputs['username']);
        $manager->password = bcrypt(e($inputs['password']));
        $manager->email = e($inputs['email']);
        $manager->realname = e($inputs['realname']);

        if ($manager->save()) {
            $manager->roles()->attach($inputs['role']);  //附加上用户组（角色）
        }

        return $manager;
    }


    /**
     * 更新管理型用户
     *
     * @param  App\Model\UserModel $manager
     * @param  array $inputs
     * @return void
     */
    private function updateManager($manager, $inputs)
    {
        $manager->nickname = e($inputs['nickname']);
        $manager->realname = e($inputs['realname']);
        $manager->is_locked = e($inputs['is_locked']);
        if ((!empty($inputs['password'])) && (!empty($inputs['password_confirmation']))) {
            $manager->password = bcrypt(e($inputs['password']));
        }
        if ($manager->save()) {

            //确保一个管理员只拥有一个角色
            $roles = $manager->roles;
            if ($roles->isEmpty()) {  //判断角色结果集是否为空
                $manager->roles()->attach($inputs['role']);  //空角色，则直接同步角色
            } else {
                if (is_array($roles)) {
                    //如果为对象数组，则表明该管理用户拥有多个角色
                    //则删除多个角色，再同步新的角色
                    $manager->detachRoles($roles);
                    $manager->roles()->attach($inputs['role']);  //同步角色
                } else {
                    if ($roles->first()->id !== $inputs['role']) {
                        $manager->detachRole($roles->first());
                        $manager->roles()->attach($inputs['role']);  //同步角色
                    }
                }
            }
            //上面这一大段代码就是保证一个管理员只拥有一个角色
        }
    }

    /**
     * 获取所有角色(用户组)
     *
     * @return Illuminate\Support\Collection
     */
    public function role()
    {
        return $roles = $this->role->all();
    }

    /**
     * 获取用户角色
     *
     * @param  App\Model\UserModel
     * @return Illuminate\Support\Collection
     */
    public function getRole($manager)
    {
        return $manager->roles->first();
    }

    /**
     * 伪造一个id为0的Role对象
     *
     * @return App\Model\RoleModel
     */
    public function fakeRole()
    {
        $role = new $this->role;
        $role->id = 0;  //id置为不存在的0
        return $role;
    }
    
    /**
     * 根据角色id获取用户ids
     */
    public function getUserIdsByRole($role_id)
    {
        $ids = array();
        if (!empty($role_id)) {
            // 先查询该角色的所有用户的id
            $userIds = DB::table('role_user')->where('role_id', '=', $role_id)->get();
            foreach ($userIds as $p) {
                $ids[] = $p->user_id;
            }            
        } 
        
        return $ids;
    }


    #********
    #* 资源 REST 相关的接口函数 START
    #********
    /**
     * 用户资源列表数据
     *
     * @param  array $data
     * @param  string $extra
     * @param  string $size 分页大小
     * @return Illuminate\Support\Collection
     */
    public function index($data = [], $extra = '', $size = null)
    {
        if (!ctype_digit($size)) {
            $size = cache('page_size', '10');
        }

        $s_phone = e($data['s_phone']);
        if (!empty($s_phone)) {
            $users = $this->model->where('phone', '=', $s_phone)
            ->where(function ($query) use ($data) {
                $s_name = e($data['s_name']);
                if (!empty($s_name)) {
                    $query->where('username', 'like', '%'.$s_name.'%')
                    ->orWhere('nickname', 'like', '%'.$s_name.'%')
                    ->orWhere('realname', 'like', '%'.$s_name.'%');
                }
                
                $s_role = e($data['s_role']);
                if (!empty($s_role)) {                    
                    $ids = $this->getUserIdsByRole($s_role);     
                    $query->whereIn('id', $ids); 
                }       
            })->paginate($size);
        } else {
            $users = $this->model->where(function ($query) use ($data) {
                $s_name = e($data['s_name']);
                if (!empty($s_name)) {
                    $query->where('username', 'like', '%'.$s_name.'%')
                    ->orWhere('nickname', 'like', '%'.$s_name.'%')
                    ->orWhere('realname', 'like', '%'.$s_name.'%');
                }

                $s_role = e($data['s_role']);
                if (!empty($s_role)) {                    
                    $ids = $this->getUserIdsByRole($s_role);     
                    $query->whereIn('id', $ids); 
                }
            })->paginate($size);
        }

        return $users;
    }

    /**
     * 存储用户
     *
     * @param  array $inputs
     * @param  string $extra
     * @return App\Model\UserModel
     */
    public function store($inputs, $extra = '')
    {
        $user = new $this->model;

        $user = $this->saveManager($user, $inputs);

        return $user;
    }


    /**
     * 获取编辑的用户
     *
     * @param  int $id
     * @param  string $extra
     * @return App\Model\UserModel
     */
    public function edit($id, $extra = '')
    {
        $user = $this->model->findOrFail($id);
        return $user;
    }

    /**
     * 更新用户
     *
     * @param  int $id
     * @param  array $inputs
     * @param  string $extra
     * @return void
     */
    public function update($id, $inputs, $extra = '')
    {
        $user = $this->model->findOrFail($id);
        $user = $this->updateManager($user, $inputs);
    }
    #********
    #* 资源 REST 相关的接口函数 END
    #********

    /**
     * 更新当前用户资料
     * 
     * @param  App\Model\UserModel $me
     * @param  array $inputs
     * @return void
     */
    public function updateMe($me, $inputs)
    {
        $me->nickname = e($inputs['nickname']);
        $me->realname = e($inputs['realname']);
        if (!empty($inputs['phone'])) {
            $me->phone = e($inputs['phone']);
        }
        if ((!empty($inputs['password'])) && (!empty($inputs['password_confirmation']))) {
            $me->password = bcrypt(e($inputs['password']));
        }
        if ($me->save()) {
            //触发更新个人资料事件，这里将触发事件放置在仓库里可能有些不妥
            //event(new UserUpdate($me));
        }
    }

}
