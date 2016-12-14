<?php

namespace App\Http\Requests;

class MemberGroupRequest extends Request
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
                'name'                  => 'required|min:1|max:20',
            ];
        }
        //store
        else{
            $rules = [
                'name'                  => 'required|min:1|max:20|unique:member_rank,name',
            ];
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.unique'               => '此分组名已存在，请尝试其它名字组合',
            'name.required'             => '请填写分组名',
            'name.max'                  => '分组名过长，长度不得超出20',
            'name.min'                  => '分组名过短，长度不得少于1',
        ];
    }
}
