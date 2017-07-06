<?php

namespace App\Model\System;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use Syrator\Data\SyratorModel;

/**
 * 角色模型
 *
 */
class AppGuideModel extends SyratorModel
{
    use SoftDeletes;
    
    protected $table = 'app_guide';
}
