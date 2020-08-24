<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
use Session;
session_start();
class AddCartController extends Controller
{
    public function AddToCart(Request $request){
        $qty= $request->qty;
        $product_id= $request->product_id;

        $product_info=DB::table('product')->where('product_id',$product_id)->first();

      
        $data['id']=$product_info->product_id;
        $data['name']=$product_info->product_name;
        $data['price']=$product_info->product_price;
        $data['quantity']=$qty;
        $data['attributes']['image']=$product_info->product_image;
      
        Cart::add($data);
        return Redirect::to('/showCart');
    }

    public function ShowCart(){
             $showCategory=DB::table('category')
             ->where('publication_status',1)
             ->get();

             return view('pages.addCart',compact('showCategory'));
    }

    public function DeleteTOCart($id){
           Cart::remove($id);
           return Redirect::to('/showCart');
    }

    public function UpdateCart(Request $request){

     
        $qty= $request->qty;
        $id= $request->id;

        // echo $qty;
        // echo "<br>";
        // echo $id;
        Cart::update($id, array(
        'quantity' => array(
        'relative' => false,
        'value'=> $qty,
        ),
        ));
         
         return Redirect::to('/showCart');
    }
 }

