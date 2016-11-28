<?php

namespace App\Http\Requests;

class MaterialCatRequest extends Request
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
            'parent'       => 'required',
            'sort_num'      => 'required',
            'is_show'      => 'required',
            'keywords'     => 'max:255',
            'description'  => 'max:255',
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
            'name.required'     => '请填写名称',
            'name.min'          => '名称字数不得少于2',
            'name.max'          => '名称字数不得多于10',
            'name.unique'       => '此名称已存在于系统中',

            'parent.required'   => '请填写上级分类',
            
            'sort_num.required' => '请填写排序序号',
            
            'is_show.required'  => '请选择是否显示',
            
            'keywords.max'      => '关键字太长',
            
            'description.max'   => '描述太长',
        ];
    }
}
