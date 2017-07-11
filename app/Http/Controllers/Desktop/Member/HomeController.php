<?php

namespace App\Http\Controllers\Member;

class HomeController extends MemberController
{
    public function getIndex()
    {
        return "会员中心";
    }
}
