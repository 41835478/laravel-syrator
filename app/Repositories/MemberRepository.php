<?php

namespace App\Repositories;

use Syrator\Data\SyratorRepository;

use App\Model\MemberModel;
use App\Model\MemberRankModel;

/**
 * 会员仓库MemberRepository
 * 主 Model 为 Member
 *
 */
class MemberRepository extends SyratorRepository
{
    protected $memberRank;
    
    public function __construct(MemberModel $member, MemberRankModel $memberRank)
    {
        $this->model = $member;
        $this->memberRank = $memberRank;
    }
    
    public function all()
    {
        $members = $this->model->all();
        return $members;
    }
    
    public function getMemberRanks()
    {
        $memberRanks = $this->memberRank->all();
        return $memberRanks;
    }
    
    public function getRankById($id)
    {
        return $this->memberRank->findOrFail($id);
    }
    
    private function saveMember($member, $inputs)
    {
        $member->phone = e($inputs['phone']);
        $member->account = e($inputs['account']);
        if (isset($inputs['password']) && !empty(e($inputs['password']))) {
            $member->password = bcrypt(e($inputs['password'])); 
        }
        $member->email = e($inputs['email']);
        $member->role = e($inputs['role']);
        $member->nickname = e($inputs['nickname']);
    
        if ($member->save()) {
        }
    
        return $member;
    }
    
    private function saveMemberRank($memberRank, $inputs)
    {
        $memberRank->name = e($inputs['name']);
    
        if ($memberRank->save()) {
        }
    
        return $memberRank;
    }

    // 接口函数
    public function index($data = [], $extra = '', $size = null)
    {
        return MemberModel::mergeData($this->all());
    }
   
    public function indexRank($data = [], $extra = '', $size = null)
    {
        return $this->memberRank->all();
    }

    public function store($inputs, $extra = '')
    {
        $member = new $this->model;
        $member = $this->saveMember($member, $inputs);
        return $member;
    }
    
    public function storeRank($inputs, $extra = '')
    {
        $memberRank = new $this->memberRank;
        $memberRank = $this->saveMemberRank($memberRank, $inputs);
        return $memberRank;
    }

    public function edit($id, $extra = '')
    {
        $member = $this->getById($id);
        return $member;
    }
    
    public function editRank($id, $extra = '')
    {
        $memberRank = $this->getRankById($id);
        return $memberRank;
    }

    public function update($id, $inputs, $extra = '')
    {
        $member = $this->getById($id);
        $member = $this->saveMember($member, $inputs);
    }
    
    public function updateRank($id, $inputs, $extra = '')
    {
        $memberRank = $this->getRankById($id);
        $memberRank = $this->saveMemberRank($memberRank, $inputs);
    }
    
    /**
     * 通过会员账户(phone/email/account)获取会员
     * 
     * @param string $account
     */
    public function getByAccount($account)
    {
        if (empty($account)) {
            return null;
        }
        
        return $this->model->whereRaw('phone=? or email=? or account=?', 
            [$account,$account,$account])->get()->first();
    }
    
    /**
     * 根据微信id获取会员
     *  
     * @param string $wchat_id
     */
    public function getByWechatID($wchat_id)
    {
        if (empty($wchat_id)) {
            return null;
        }
    
        return $this->model->where('wechat_id','=',$wchat_id)->get()->first();
    }
}
