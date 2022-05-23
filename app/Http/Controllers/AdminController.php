<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Order;
use App\Models\Foodchef;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users()
    {
        $data = User::all();
        return view('admin.users',compact('data'));
    }

    public function deleteuser($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function food()
    {
        // $data = Food::all();
        return view('admin.food');
    }

    public function controlfood()
    {
         $data = Food::all();
        return view('admin.controlfood',compact('data'));
    }

    public function updateview($id)
    {
        $data = Food::find($id);
        return view('admin.updateview',compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'price'=>'required',
            'description'=>'required'
        ]);
        $dataf = new Food;
        $image = $request->image;
        $imagename =time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);
        $dataf->image=$imagename;
        $dataf->title=$request->title;
        $dataf->price=$request->price;
        $dataf->description=$request->description;
        // $products = Food::create($request->all());
         $dataf->save();
        //  $products->save();
         return redirect()->back();
    }

    public function deletefood($id)
    {
        $data = Food::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function updatefood(Request $request,$id)
    {
        // $request->validate([
        //     'title'=>'required',
        //     'price'=>'required',
        //     'description'=>'required'
        // ]);
        $dataf = Food::find($id);
        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);
        $dataf->image= $imagename;
        }
        
        $dataf->title=$request->title;
        $dataf->price=$request->price;
        $dataf->description=$request->description;
        // $products = Food::create($request->all());
         $dataf->save();
        //  $products->save();
         return redirect()->back();
    }

    public function reservation()
    {
         $data = Reservation::all();
        return view('admin.reservation',compact('data'));
    }

    public function deletereservation($id)
    {
        $data = Reservation::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function foodchef()
    {
        
        return view('admin.foodchef');
    }

    public function chefs(Request $request)
    {
        // $request->validate([
        //     'title'=>'required',
        //     'price'=>'required',
        //     'description'=>'required'
        // ]);
        
        $dataf = new Foodchef;
        $image = $request->image;
        $imagename =time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);
        $dataf->image=$imagename;
        $dataf->name=$request->name;
        $dataf->speciality=$request->speciality;
        
        // $products = Food::create($request->all());
         $dataf->save();
        //  $products->save();
         return redirect()->back();
    }

    public function controlchef()
    {
         $data = Foodchef::all();
        return view('admin.controlchef',compact('data'));
    }

    public function deletechef($id)
    {
        $data = Foodchef::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function updatechef(Request $request,$id)
    {
        // $request->validate([
        //     'title'=>'required',
        //     'price'=>'required',
        //     'description'=>'required'
        // ]);
        $dataf = Foodchef::find($id);
        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);
        $dataf->image= $imagename;
        }
        
        $dataf->name=$request->name;
        $dataf->speciality=$request->speciality;
        
        // $products = Food::create($request->all());
         $dataf->save();
        //  $products->save();
         return redirect()->back();
    }

    public function updatechefview($id)
    {
        $data = Foodchef::find($id);
        return view('admin.updatechef',compact('data'));
    }

    public function orders()
    {
         $data = Order::all();
        return view('admin.orders',compact('data'));
    }

    public function search(Request $request)
    {
        $search=$request->search;
         $data = Order::where('name','Like','%'.$search.'%')
         ->orwhere('foodname','Like','%'.$search.'%')->get();
        return view('admin.orders',compact('data'));
    }

}
