<?php

namespace App\Repositories;

use App\Model\MemberModel;
use App\Model\MemberRankModel;

/**
 * 会员仓库MemberRepository
 * 主 Model 为 Member
 *
 */
class MemberRepository extends BaseRepository
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
    
    private function saveMember($member, $inputs)
    {
        $member->phone = e($inputs['phone']);
        $member->password = e($inputs['password']);
    
        if ($member->save()) {
        }
    
        return $member;
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

    public function edit($id, $extra = '')
    {
        $member = $this->getById($id);
        return $member;
    }

    public function update($id, $inputs, $extra = '')
    {
        $member = $this->getById($id);
        $member = $this->saveMember($member, $inputs);
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
}
