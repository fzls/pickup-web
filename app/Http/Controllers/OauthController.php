<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class OauthController extends Controller
{
    public function redirect(){
        return view('oauth.redirect');
    }

    public function callback(Request $request){
        return view('oauth.callback');
    }
}
