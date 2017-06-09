<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
        return true;
    }

    /**
     * 自定义验证规则rules
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(4) ? ',' . $this->segment(4) : '';
        $rules = [
            'name'         => 'required|min:1|max:20|unique:permissions,name'.$id,
            'display_name' => 'required|min:1|max:40',
            'description'  => 'max:80',
        ];
        return $rules;
    }

    /**
     * 自定义验证信息
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'           => '权限名必须填写',
            'name.max'                => '权限名长度不要超出20',
            'name.min'                => '权限名长度不得少于3',
            'name.eng_alpha'          => '权限名只能为英文字母组合',
            'name.unique'             => '系统已存在该权限名',
            'display_name.required'   => '权限展示名必须填写',
            'display_name.max'        => '权限展示名长度不要超出40',
            'display_name.min'        => '权限展示名长度不得少于3',
            'display_name.alpha_dash' => '权限展示名必须为常规字符',
            'description.max'         => '描述长度不要超出80',
        ];
    }
}
