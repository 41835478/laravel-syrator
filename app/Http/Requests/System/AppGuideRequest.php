<?php

namespace App\Http\Requests\System;

use App\Http\Requests\Request;

class AppGuideRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        //update
        if($this->segment(4)){
            $rules = [
                'name'                     => 'required',
                'url'                      => 'required',
                'sort_num'                 => 'required',
                'is_show'                  => 'required',                
            ];
        }
        //store
        else{
            $rules = [
                'name'                     => 'required',
                'url'                      => 'required',
                'sort_num'                 => 'required',
                'is_show'                  => 'required',
            ];
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'                => '请填写名称',

            'url.required'                 => '请上传图片',

            'sort_num.required'            => '请填写排序序号',

            'is_show.required'             => '请选择是否显示',
        ];
    }
}
