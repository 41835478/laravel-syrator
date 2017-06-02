<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * 意见反馈模型
 *
 */
class FeedbackModel extends Model
{
    protected $table = 'feedback';
    
    public function getAuthor() {
        if (empty($this->user_id)) {
            return null;
        }
    
        return MemberModel::find($this->user_id);
    }
}
