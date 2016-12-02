<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * 完善必要的信息，如学校
     */
    public function addNecessaryExtraInfo(){
        return view('account.register');
    }
}
