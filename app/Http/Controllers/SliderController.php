<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
use Session;
session_start();

class SliderController extends Controller
{
    public function Authcheck(){
        $admin_id=Session::get('admin_id');
    
        if($admin_id){
         return;
        }
        else{
            return Redirect::to('/backslash')->send();
        }
         }  

   public function index(){
       return view('Admin.addSlider');
   }

   public function saveSlider(Request $request){
    $this->Authcheck();
    $data=array();
     $data['publication_status']=$request->publication_status;
    $image=$request->file('slider_image');
     if ($image) {
        $image_name=hexdec(uniqid());
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='slider/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['slider_image']=$image_url;
        DB::table('slider')->insert($data);
        Session::put('message','Data Inserted successfully');
         return Redirect::to('/addSlider');
    }else{
         DB::table('slider')->insert($data);
         Session::put('message','Data Inserted successfully without image');
         return Redirect::to('/addSlider');
  }
   }

   public function ALLSlider(){
       $data=DB::table('slider')->get();
       return view('Admin.allSlider',compact('data'));
   }

   public function Deleteslider($slider_id){
    $this->Authcheck();
    DB::table('slider')
    ->where('slider_id',$slider_id)
    ->delete();
    return Redirect::to('/allSlider');
}
public function Inactiveslider($slider_id){
    DB::table('slider')
    ->where('slider_id',$slider_id)
    ->update(['publication_status'=>0]);
    Session::put('message','Inactive Successfully');
    return Redirect::to('/allSlider');

}

public function Activeslider($slider_id){
    DB::table('slider')
    ->where('slider_id',$slider_id)
    ->update(['publication_status'=>1]);
    Session::put('message','Actived Successfully');
    return Redirect::to('/allSlider');
}
   
}
