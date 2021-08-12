<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Foodchef;
use App\Models\Foods;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index(){
        if(Auth::id()){
            return redirect('redirects');
        }
        else{
        $data = Foods::all();
        $chef = Foodchef::all();
        $container['chefs'] = $chef;
        $container['datas'] = $data;
        return view('home',$container);
        }
    }

    public function redirects(){
        $data = Foods::all();
        $chef = Foodchef::all();
        $container['chefs'] = $chef;     
        $container['datas'] = $data;

        $usertype = Auth::user()->usertype;

        if( $usertype == '1')
        {
            return view('admin.admin');
        }else
        {
            $user_id = Auth::Id();
            $count = Cart::where('user_id',$user_id)->count();
            $container['count'] = $count;
            return view('home',$container);
        }
    }

    public function addcart($id,Request $request){
        if(Auth::id())
        {
            $user_id = Auth::Id();
            $food_id =  $id;
            $quantity = $request->quantity;

            $cart = new Cart();
            $cart->user_id = $user_id;
            $cart->food_id = $food_id;
            $cart->quantity = $quantity;
            $cart->save();

            
            return redirect()->back();
        }
        else{
            return redirect('/login');
        }
    }

    public function showcart(Request $request, $id){
        $count = Cart::where('user_id',$id)->count();
        if(Auth::id() == $id){

        $data = Cart::where('user_id',$id)->join('foods','carts.food_id', '=','foods.id')->get();
        $data2 = Cart::select('*')->where('user_id','=',$id)->get();
        $container['carts']= $data;
        $container['count'] = $count;
        $container['data2'] = $data2;
        return view('showcart',$container);
        }else{
            return redirect()->back();
        }
    }

    public function remove($id){
        $data = Cart::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function orderconfirm(Request $request){

        foreach($request->foodname as $key=>$foodname)
        {
            $data = new Order();
            $data->foodname = $foodname;
            $data->price = $request->price[$key];
            $data->quantity = $request->quantity[$key];

            $data->name = $request->name;
            $data->address = $request->address;
            $data->phone = $request->phone;
            $data->save();

        }
        return redirect()->back();
    }
}
