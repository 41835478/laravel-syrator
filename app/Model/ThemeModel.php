<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use Syrator\Data\SyratorModel;

/**
 * 前端主题模型
 *
 */
class ThemeModel extends SyratorModel
{
    use SoftDeletes;
    
    protected $table = 'theme';
}
