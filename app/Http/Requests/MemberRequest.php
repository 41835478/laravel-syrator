<?php

namespace App\Http\Requests;

class MemberRequest extends Request
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
                'phone'                     => 'required|size:11|mobile_phone|unique:member,phone',
                'account'                   => 'required|min:4|max:10|eng_alpha_num|unique:member,account',
                'password'                  => 'min:6|max:16|regex:/^[a-zA-Z0-9~@#%_]{6,16}$/i',
                'email'                     => 'required|email|unique:member,email',
                'role'                      => 'required|exists:member_rank,id',
            ];
        }
        //store
        else{
            $rules = [
                'phone'                     => 'size:11|mobile_phone|unique:member,phone',
                'account'                   => 'required|min:4|max:10|eng_alpha_num|unique:member,account',
                'password'                  => 'required|min:6|max:16|regex:/^[a-zA-Z0-9~@#%_]{6,16}$/i',
                'email'                     => 'required|email|unique:member,email',
                'role'                      => 'required|exists:member_rank,id',
            ];
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'phone.required'                => '请填写手机号',
            'phone.size'                    => '国内的手机号码长度为11位',
            'phone.mobile_phone'            => '请填写合法的手机号码',
            'phone.unique'                  => '此手机号码已存在于系统中，不能再进行二次关联',

            'account.unique'                => '此登录名已存在，请尝试其它名字组合',
            'account.required'              => '请填写登录名',
            'account.max'                   => '登录名过长，长度不得超出10',
            'account.min'                   => '登录名过短，长度不得少于4',
            'account.eng_alpha_num'         => '登录名只能阿拉伯数字与英文字母组合',
            'account.unique'                => '此登录名已存在，请尝试其它名字组合',

            'password.required'             => '请填写登录密码',
            'password.min'                  => '密码长度不得少于6',
            'password.max'                  => '密码长度不得超出16',
            'password.regex'                => '密码包含非法字符，只能为英文字母(a-zA-Z)、阿拉伯数字(0-9)与特殊符号(~@#%_)组合',

            'email.required'                => '请填写邮箱地址',
            'email.email'                   => '请填写正确合法的邮箱地址',
            'email.unique'                  => '此邮箱地址已存在于系统，不能再进行二次关联',

            'role.required'                 => '请选择角色（用户组）',
            'role.exists'                   => '系统不存在该角色（用户组）',
        ];
    }
}
