<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use Syrator\Data\SyratorModel;

/**
 * 意见反馈模型
 *
 */
class FeedbackModel extends SyratorModel
{
    use SoftDeletes;
    
    protected $table = 'feedback';
    
    public function getAuthor() {
        if (empty($this->user_id)) {
            return null;
        }
    
        return MemberModel::find($this->user_id);
    }
}
