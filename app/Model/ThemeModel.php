<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * 前端主题模型
 *
 */
class ThemeModel extends Model
{
    use SoftDeletes;
    
    protected $table = 'theme';
}
