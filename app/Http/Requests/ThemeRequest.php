<?php

namespace App\Http\Requests;

class ThemeRequest extends Request
{
    public function authorize()
    {
        //return false;
        return true;
    }

    public function rules()
    {
        //update
        if($this->segment(4)){            
            $rules = [
                'code'              => 'required|min:4|max:10|eng_alpha_num',
                'name'              => 'required|min:2|max:255|regex:/^[\x{4e00}-\x{9fa5}]{2,5}$/u',              
                'is_current'        => 'required|boolean',
            ];
        }
        //store
        else{            
            $rules = [
                'code'              => 'required|min:4|max:10|eng_alpha_num|unique:theme',
                'name'              => 'required|min:2|max:255|regex:/^[\x{4e00}-\x{9fa5}]{2,5}$/u',              
                'is_current'        => 'required|boolean',
            ];
        }
        
        return $rules;
    }
    
    public function messages()
    {
        return [
            'code.required'         => '请填写编码',
            'code.eng_alpha_num'    => '编码不能包含特殊字符',
            'code.min'              => '编码过短，长度不得少于4',
            'code.max'              => '编码过长，长度不得超出10',
            'code.unique'           => '此编码已存在，请尝试其它编码组合',

            'name.required'         => '请填写模板名',
            'name.max'              => '名称过长，长度不得超出255',
            'name.min'              => '名称过短，长度不得少于2',
            'name.regex'            => '名称包含非法字符，必须为中文',

            'is_current.required'   => '请选择模板状态',
            'is_current.boolean'    => '模板状态必须为布尔值',
        ];
    }
}
