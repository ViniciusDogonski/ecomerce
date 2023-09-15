<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        $role = Auth::user()->role;

        if($role == '0'){
            return view('admin');
        }else if($role == '1'){
            return redirect('/user');
        }else{
            return view('welcome');
        }

}
}
