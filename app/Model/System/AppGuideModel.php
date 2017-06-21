<?php

namespace App\Model\System;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * 角色模型
 *
 */
class AppGuideModel extends Model
{
    use SoftDeletes;
    
    protected $table = 'app_guide';
}
