<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
use Session;
class checkoutController extends Controller
{
    public function loginCheck(){
        return view('pages.login');
    }

    public function UserRegistration(Request $request){
              $data=array();
              $data['customer_name']=$request->customer_name;
              $data['customer_email']=$request->customer_email;
              $data['password']=$request->password;
              $data['mobile_number']=$request->mobile_number;

             $customer_id= DB::table('customer')->insertGetid($data);
                 Session::put('customer_id',$customer_id);
                 Session::put('customer_name',$request->customer_name);

                 return Redirect::to('Checkout');
    }

    public function userLogin(Request $request){
            $customer_email=$request->customer_email;
            $password=$request->password;

            $result=DB::table('customer')
            ->where('customer_email',$customer_email)
            ->where('password',$password)
            ->first();

            if($result){
                Session::put('customer_id',$result->customer_id);
                return Redirect::to('Checkout');
            }else{
                return Redirect::to('loginCheck');
            }

    }

    public function Checkout(){
        return view('pages.checkout');
    }

    public function saveShipping(Request $request){
       $data=array();
       $data['shipping_email']=$request->shipping_email;
       $data['shipping_first_name']=$request->shipping_first_name;
       $data['shipping_last_name']=$request->shipping_last_name;
       $data['shipping_address']=$request->shipping_address;
       $data['shipping_mobile_number']=$request->shipping_mobile_number;
       $data['shipping_city']=$request->shipping_city;

       $shipping=DB::table('shipping')->insertGetId($data);
       Session::put('shipping_id',$shipping);
       return Redirect::to('payment');
    }

    public function Payment(){
        return view('pages.payment');
    }

    public function OrderPlace(Request $request){
    $payment_gateway= $request->payment_gateway;
       
      $pdata=array();
      $pdata['payment_method']=$payment_gateway;
      $pdata['payment_status']=0;
      $payment_id=DB::table('payment')->insertGetId($pdata);

      $odata=array();
      $odata['customer_id']=Session::get('customer_id');
      $odata['shipping_id']=Session::get('shipping_id');
      $odata['payment_id']=$payment_id;
      $odata['order_total']=Cart::getTotal();
      $pdata['payment_status']=0;

      $order_id=DB::table('order')->insertGetId($odata);

      $content=Cart::getContent();
      $oddata=array();
        foreach( $content as $show_content){
            $oddata['order_id']=$order_id;
            $oddata['product_id']=$show_content->id;
            $oddata['product_name']=$show_content->name;
            $oddata['product_price']=$show_content->price;
            $oddata['product_sales_quantity']=$show_content->quantity;
           DB::table('order_details')->insert($oddata);

        }
        if($payment_gateway=='visa'){
        return view('payment.visa');
        Cart::clear();
        }
        elseif($payment_gateway=='mastercard'){
            return view('payment.mastercard');
            Cart::clear();
        }
        elseif($payment_gateway=='amex'){
            return view('payment.amex');
            Cart::clear();
        }
        elseif($payment_gateway=='DebitCard'){
            return view('payment.DebitCard');
            Cart::clear();
        }else{
            echo "not selected";
        }


    }
    public function ManageOrder(){
        $manage_order=DB::table('order')
        ->join('customer','order.customer_id','customer.customer_id')
        ->select('order.*','customer.customer_name')
        ->get();
        return view('Admin.manageOrder',compact('manage_order'));
    }

    public function Vieworder($order_id){
        $view_order=DB::table('order')
        ->where('order.order_id',$order_id)
        ->join('customer','order.customer_id','customer.customer_id')
        ->join('order_details','order.order_id','order_details.order_id')
        ->join('shipping','shipping.shipping_id','order.shipping_id')
        ->select('order.*','customer.*','order_details.*','shipping.*')
        ->get();
        return view('Admin.viewOrder',compact('view_order'));

       
    }
    public function Deleteorder($order_id){
      
        DB::table('order')->where('order_id',$order_id)->delete();
        return Redirect::to('/manageOrder');
      }

      public function Inactiveorder($order_id){
        DB::table('order')
        ->where('order_id',$order_id)
        ->update(['order_status'=>0]);
        Session::put('message','Inactive Successfully');
        return Redirect::to('/manageOrder');
     
     }


     public function Activeorder($order_id){
        DB::table('order')
      ->where('order_id',$order_id)
      ->update(['order_status'=>1]);
      Session::put('message','activated Successfully');
       return Redirect::to('/manageOrder');
   }

    public function CustomerLogout(){
        Session::flush();
        return Redirect::to('/');
    }
}
