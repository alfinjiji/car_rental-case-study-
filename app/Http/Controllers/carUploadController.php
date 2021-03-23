<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\car;
class carUploadController extends Controller
{
    public function insert(){
        return view('pages.car-register');
    }
    public function create( Request $request){
        $this->validate($request, [
            'car_image' => 'required|image|mimes:jpg,png,gif,jpeg|max:10240'
        ]);
        $image = $request->file('car_image');
        $newname = rand() . '.' . $image->getClientOriginalExtension();
       // $image->move(public_path("images"), $newname);
        $path = $request->file('car_image')->storeAs('public/images',$newname);

        $uid = $request->input('uid');
        $brand = $request->input('brand');
        $model = $request->input('model');
        $km = $request->input('km');
        $seat = $request->input('seat');
        $luggage = $request->input('luggage');
        $gear = $request->input('gear');
        $year = $request->input('year');
        $city = $request->input('city');
        $fuel = $request->input('fuel');
        $price = $request->input('price');
        $data=array('uid'=>$uid,"brand"=>$brand,"model"=>$model,"km"=>$km,"seat"=>$seat,"luggage"=>$luggage,"gear"=>$gear,"year"=>$year,"city"=>$city,"fuel"=>$fuel,"price"=>$price,"car_image"=>$newname);
        DB::table('cars')->insert($data); 
        return back()->with('success', 'Car Registered Sucessfully')->with('path',$newname);
      //  return redirect()->back()->with('alert', 'Car Registered Sucessfully');
    }
}
