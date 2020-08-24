<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
use Session;
session_start();
class SuperAdminController extends Controller
{
    
    
    public function index()
    {
        $this->Authcheck();
    return view('Admin.dashboard');
   }

   public function Authcheck(){
    $admin_id =Session::get('admin_id');

    if($admin_id){
     return;
    }
    else{
        return Redirect::to('/backslash')->send();
    }
}
    
    public function logout(){
        Session::flush();
        
        return Redirect::to('/backslash');
    }

  

}
