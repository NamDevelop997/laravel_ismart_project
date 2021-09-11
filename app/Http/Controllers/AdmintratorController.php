<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Role;

class AdmintratorController extends Controller
{
    function show(){
        return view('layouts.admin.dashboard');
    }
    
   
   
}
