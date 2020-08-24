<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
use Session;
session_start();
class AdminController extends Controller
{
  
  
    public function index()
    {
    return view('Admin.adminLogin');
   }


  

  public function Dashboard(Request $req)
  {
       $admin_email=$req->admin_email;
       $admin_password=$req->admin_password;
       $insert=DB::table('tb1_admin')
      ->where('admin_email',$admin_email)
      ->where('admin_password',$admin_password)
      ->first();
      if($insert){
           Session::put('admin_name',$insert->admin_name);
           Session::put('admin_id',$insert->admin_id);
           return Redirect::to('/dashboard');
      }else{
        Session::put('message','Email or Password Invalid');
        return Redirect::to('/backslash');

      }


      
   }


}
