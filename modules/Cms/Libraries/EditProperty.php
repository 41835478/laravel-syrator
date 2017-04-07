<?php

namespace Modules\Cms\Libraries;

class EditProperty
{
    public $name = '';
    public $type = 'text';
    public $alias = '';
    public $placeholder = '';
    public $autocomplete = 'on';
    public $value = '';
    public $help = '';
    public $is_request = false;
    public $is_editable = true;
    
    public $dictionary = array();
}
