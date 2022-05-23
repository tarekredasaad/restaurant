<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Reservation;
use App\Models\Card;
use App\Models\Order;
class HomeController extends Controller
{
    public function index()
    {
        $data = Food::all();
        $data2 = Foodchef::all();
        return view('site',compact('data','data2'));
    }

    

    public function redirects()
    {
        $usertype=Auth::user()->usertype;
        $data = Food::all();
        $data2 = Foodchef::all();
        if($usertype == 1)
        {
            return view('admin.adminhome');
        }else
        {
            $user_id=Auth::id();
            $count = Card::where('user_id',$user_id)->count();
            return view('site',compact('data','data2','count'));
        }
        
    }

    public function reservation(Request $request)
    {
        $data =new Reservation;

        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->guest=$request->guest;
        $data->date=$request->date;
        $data->time=$request->time;
        $data->message=$request->message;

        $data->save();
        return redirect()->back();
    }

    public function addcard(Request $request,$id)
    {
        // Auth::user()->id = Auth::id()
        if(Auth::id()){
            $user_id=Auth::id();
            // dd($user_id);
            $foodid=$id;
            $quantity=$request->quantity;

            $card = new Card;
            $card->food_id=$foodid;
            $card->user_id=$user_id;
            $card->quantity=$quantity;

            $card->save();
            return redirect()->back();
        }else{
            return redirect('/login');
        }
    }

    public function showcard(Request $request,$id){
        $count =Card::where('user_id',$id)->count();
        if(Auth::id()==$id){
        $data2=Card::select('*')->where('user_id','=',$id)->get();
        
        $data =Card::where('user_id',$id)->join('food','cards.food_id','=','food.id')->get();
        return view('showcard',compact('count','data','data2'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function remove($id)
    {
        $data = Card::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function orderconfirm(Request $request){

        

        foreach($request->foodname as $key =>$foodname)
        {
            $data =new Order;

            $data->foodname=$foodname;
            $data->price=$request->price[$key];
            $data->quantity=$request->quantity[$key];
            $data->name=$request->name;
            $data->phone=$request->phone;
            $data->address=$request->address;

            $data->save();
        }

        return redirect()->back();
    }
}
