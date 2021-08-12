<?php

namespace App\Http\Controllers;

use App\Models\Foodchef;
use App\Models\Foods;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function user(){
        $data = User::all();
        $container['users'] = $data;
        return view('admin.user',$container);
    }

    public function delete($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->back();

    }

    public function foodmenu(){
        $data = Foods::all();
        $container['foods'] = $data;
        return view('admin.foodmenu',$container); 
    }

    public function uploadfood(Request $request){
        $data = new Foods();
        $image=$request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('foodimage',$imagename);

            $data->image = $imagename;
            $data->title = $request->title;
            $data->price = $request->price;
            $data->description = $request->description;
            $data->save();
            return redirect()->back();
    }

    public function deletefoodmenu($id){
        $data = Foods::find($id);
        $data->delete();
        $container['food'] = $data;
        return redirect()->back();
    }

    public function updateview($id){

        $data = Foods::find($id);
        $container['food'] = $data;
        return view('admin.updateview',$container);
    }

    public function updatefood($id,Request $request){
        $data = Foods::find($id);
        if($request->image){
        $image=$request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('foodimage',$imagename);

            $data->image = $imagename;
        }
            $data->title = $request->title;
            $data->price = $request->price;
            $data->description = $request->description;
            $data->save();
            return redirect()->back();
    }

    public function reservation(Request $request){
        $data = new Reservation();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;
        $data->save();
        return redirect()->back();
    }

    public function viewreservation(){

        if(Auth::id()){
        $data = Reservation::all();
         $container['reservations'] = $data;
         return view('admin.adminreservation',$container);
        }else{
            return redirect('login');
        }
    }

    public function viewchef(){
        $data = Foodchef::all();
        $container['foodchefs'] = $data;
        return view('admin.adminchef',$container);
    }

    public function uploadchef(Request $request){
        $data = new Foodchef();
        $image=$request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('chefimage',$imagename);

            $data->image = $imagename;
        $data->name = $request->name;
        $data->speciality = $request->speciality;
        $data->save();
        return redirect()->back();
    }

    public function updatechefview($id){
        $data = Foodchef::find($id);
        $container['foodchef'] = $data;
        return view('admin.updatechef',$container);
    }

    public function updatefoodchef($id,Request $request){
        $data = Foodchef::find($id);

        if($request->image){
            $image=$request->image;
            $imagename = time().'.'.$image->getClientOriginalExtension();
                $request->image->move('chefimage',$imagename);
    
                $data->image = $imagename;
            }
                $data->name = $request->name;
                $data->speciality = $request->speciality;
               
                $data->save();
                return redirect()->back();
    }

    public function deletechef($id){
        $data = Foodchef::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function orders(){
        $data = Order::all();
        $container['orders'] = $data;
        return view('admin.orders',$container);
    }

    public function search(Request $request){
        $search = $request->search;
        $data = Order::where('name','Like','%'.$search.'%')->orWhere('foodname','Like','%'.$search.'%')->get();
        $container['orders'] = $data;
        return view('admin.orders',$container);
    }
}
