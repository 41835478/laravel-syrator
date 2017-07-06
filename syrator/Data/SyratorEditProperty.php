<?php

namespace Syrator\Data;

class SyratorEditProperty
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
    public $show_type = "";
    
    public $dictionary = array();
}
