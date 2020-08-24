<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
use Session;
session_start();
class ManufactureController extends Controller
{

   

    public function index(){
        $this->Authcheck();
        return view('Admin.addManufacture');
    }

   
  
    public function SaveManufacture(Request $request){
        $this->Authcheck();
        $data=array();
        //$data['manufacture_id']=$request->id;
        $data['manufacture_name']=$request->manufacture_name;
        $data['manufacture_descrition']=$request->manufacture_description;
        $data['publication_status']=$request->publication_status;
        DB::table('manufacture')->insert($data);
        Session::put('message','Manufacture Inserted Successfully');
        return Redirect::to('/allManufacture');
    }

    public function AllManufacture(){
       $this->Authcheck();
        $manufacture= DB::table('manufacture')->get();
        return view('Admin.allManufacture',compact('manufacture'));
    }

    public function Deletemanufacture($manufacture_id){
        $this->Authcheck();
        DB::table('manufacture')
        ->where('manufacture_id',$manufacture_id)
        ->delete();
        return Redirect::to('/allManufacture');
 }
      public function Inactivemanufacture($manufacture_id){
      DB::table('manufacture')
      ->where('manufacture_id',$manufacture_id)
      ->update(['publication_status'=>0]);
      Session::put('message','Inactive Successfully');
      return Redirect::to('/allManufacture');
  
 }
 public function Activemanufacture($manufacture_id){
    DB::table('manufacture')
    ->where('manufacture_id',$manufacture_id)
    ->update(['publication_status'=>1]);
    Session::put('message','activated Successfully');
     return Redirect::to('/allManufacture');
}
public function Editmanufacture($manufacture_id){
    $this->Authcheck();
    $category=DB::table('manufacture')
    ->where('manufacture_id',$manufacture_id)
    ->first();
    return view('Admin.editManufacture',compact('category'));
}
public function Updatemanufacture(Request $request,$manufacture_id){
    $this->Authcheck();
    $data=array();
    $data['manufacture_name']=$request->manufacture_name;
    $data['manufacture_descrition']=$request->manufacture_description;
    DB::table('manufacture')
    ->where('manufacture_id',$manufacture_id)
    ->update($data);
    Session::put('message','Manufacture Updated Successfully');
    return Redirect::to('/allManufacture');
}

public function Authcheck(){
    
    $admin_id=Session::get('admin_id');

    if($admin_id){
     return;
    }
    else{
        return Redirect::to('/backslash')->send();
    }
}
}
