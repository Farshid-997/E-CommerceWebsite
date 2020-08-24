<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
use Session;
session_start();
class HomeshowController extends Controller
{
    public function index(){
       
        $products=DB::table('product') 
       
        ->join('category','product.id', '=', 'category.id')
        ->join('manufacture','product.manufacture_id','=', 'manufacture.manufacture_id')
        ->select('product.*','category.category_name','manufacture.manufacture_name')
        ->where('product.publication_status',1)
        ->limit(6)
        ->get();
        return view('pages.homeContent',compact('products'));
      
    }

    public function CategoryByProduct($id){
        $products=DB::table('product') 
       
         ->join('category','product.id', '=', 'category.id')
         ->select('product.*','category.category_name')
        ->where('category.id',$id)
        ->where('product.publication_status',1)
        ->limit(6)
        ->get();
        return view('pages.CategoryByProduct',compact('products'));
   }

   public function ManufactureByProduct($manufacture_id){
    $manufacture=DB::table('product') 
   
    ->join('category','product.id', '=', 'category.id')
        ->join('manufacture','product.manufacture_id','=', 'manufacture.manufacture_id')
        ->select('product.*','category.category_name','manufacture.manufacture_name')
        ->where('manufacture.manufacture_id',$manufacture_id)
        ->where('product.publication_status',1)
        ->limit(6)
        ->get();
        return view('pages.ManufactureByProduct',compact('manufacture'));
}

public function Productdetalis_Id($product_id){
    $product_by_details=DB::table('product') 
   
        ->join('category','product.id', '=', 'category.id')
        ->join('manufacture','product.manufacture_id','=', 'manufacture.manufacture_id')
        ->select('product.*','category.category_name','manufacture.manufacture_name')
        ->where('product.product_id',$product_id)
        ->where('product.publication_status',1)
       ->first();
        return view('pages.productDetails',compact('product_by_details'));
}
}