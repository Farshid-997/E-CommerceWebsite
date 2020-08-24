<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
use Session;
session_start();
class ProductController extends Controller
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
       return view('Admin.addProduct');
     }

   public function saveProduct(Request $request){
    $this->Authcheck();
    $data=array();
    $data['product_name']=$request->product_name;
    $data['id']=$request->category_id;
    $data['manufacture_id']=$request->manufacture_id;
    $data['product_short_description']=$request->product_short_description;
    $data['product_long_description']=$request->product_long_description;
    $data['product_price']=$request->product_price;
    $data['product_size']=$request->product_size;
    $data['product_color']=$request->product_color;
    $data['publication_status']=$request->publication_status;

    $image=$request->file('product_image');

    if ($image) {
        $image_name=hexdec(uniqid());
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['product_image']=$image_url;
        DB::table('product')->insert($data);
        Session::put('message','Data Inserted successfully');
         return Redirect::to('/addProduct');
    }else{
         DB::table('product')->insert($data);
         Session::put('message','Data Inserted successfully without image');
         return Redirect::to('/addProduct');
  }
   }

   public function AllProduct(){
     $this->Authcheck();
      $products=DB::table('product')
      ->join('category','product.id', '=', 'category.id')
      ->join('manufacture','product.manufacture_id','=', 'manufacture.manufacture_id')
      ->select('product.*','category.category_name','manufacture.manufacture_name')
      ->get();
       return view('Admin.allProduct',compact('products'));
   }


   public function Deleteproduct($product_id){
    $this->Authcheck();
    DB::table('product')
    ->where('product_id',$product_id)
    ->delete();
    return Redirect::to('/allProduct');
   }

   public function Inactiveproduct($product_id){
    DB::table('product')
    ->where('product_id',$product_id)
    ->update(['publication_status'=>0]);
    Session::put('message','Inactive Successfully');
    return Redirect::to('/allProduct');

}
public function Activeproduct($product_id){
    DB::table('product')
    ->where('product_id',$product_id)
    ->update(['publication_status'=>1]);
    Session::put('message','Inactive Successfully');
    return Redirect::to('/allProduct');

}

public function Editproduct($product_id){
    $this->Authcheck();
    $product=DB::table('product') 
    ->where('product_id',$product_id)
    ->join('category','product.id', '=', 'category.id')
    ->join('manufacture','product.manufacture_id','=', 'manufacture.manufacture_id')
    ->select('product.*','category.category_name','manufacture.manufacture_name')
    ->first();
    return view('Admin.editProduct',compact('product'));
 // return response()->json( $product);
   }

   public function Updateproduct(Request $request, $product_id){
    $this->Authcheck();
    $data=array();
    $data['product_name']=$request->product_name;
 
    $data['product_short_description']=$request->product_short_description;
    $data['product_long_description']=$request->product_long_description;
    $data['product_price']=$request->product_price;
    $data['product_size']=$request->product_size;
    $data['product_color']=$request->product_color;
  
    $image=$request->file('product_image');
    if ($image) {
        $image_name=hexdec(uniqid());
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['product_image']=$image_url;
        File::delete($request->old_product_image);
        DB::table('product')->where('product_id',$product_id)->update($data);
       Session::put('message','Data Updated successfully');
        return Redirect::to('/allProduct');
       //return response()->json( $product);
    }else{
          $data['product_image']=$request->old_product_image;
          DB::table('product')->where('product_id',$product_id)->update($data);
          Session::put('message','Data Updated  without image successfully');
          return Redirect::to('/allProduct');
    }
}

  }


