<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
use Session;
session_start();
class CategoryController extends Controller
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
       $this->Authcheck();
        return view('Admin.addCategory');
    }

    public function AllCategory(){
    
      $this->Authcheck();
      $show=DB::table('category')->get();
     return view('Admin.allCategory',compact('show'));
      //return response()->json($show);
    }

    public function SaveCategory(Request $request){
      $this->Authcheck();
      $data=array();
      $data['id']=$request->id;
      $data['category_name']=$request->category_name;
      $data['category_descrition']=$request->category_description;
      $data['publication_status']=$request->publication_status;

      DB::table('category')->insert($data);
      Session::put('message','Inserted Successfully');
      return Redirect::to('/addCategory');
    }
    public function Inactivecategory($id){
       DB::table('category')
       ->where('id',$id)
       ->update(['publication_status'=>0]);
       Session::put('message','Inactive Successfully');
       return Redirect::to('/allCategory');
     //echo $id;
    }

    public function Activecategory($id){
        DB::table('category')
      ->where('id',$id)
      ->update(['publication_status'=>1]);
      Session::put('message','activated Successfully');
       return Redirect::to('/allCategory');
   }

   public function Editcategory($id){
     $category=DB::table('category')
     ->where('id',$id)
     ->first();
     return view('Admin.editCategory',compact('category'));
   }

   public function Updatecategory(Request $request, $id){
    $this->Authcheck();
     $data=array();
   
      $data['category_name']=$request->category_name;
      $data['category_descrition']=$request->category_description;
      
      DB::table('category')
      ->where('id',$id)
      ->update($data);
       Session::put('message','Updated Successfully');
       return Redirect::to('/allCategory');
  }

  public function Deletecategory($id){
    $this->Authcheck();
    DB::table('category')->where('id',$id)->delete();
    return Redirect::to('/allCategory');
  }
}
