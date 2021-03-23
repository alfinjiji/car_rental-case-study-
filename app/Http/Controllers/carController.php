<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use App\car;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class carController extends Controller
{
    public function index(Request $request,$id) {
        $cars = DB::select('select * from cars where uid=?',[$id]);
        return view('pages.your-car', ['cars'=>$cars]);
    }
    public function show() {
        if(!Auth::guest()){
            $usr=auth::user()->type;
            $user_id=auth::user()->id;
            if($usr==2){
                $cars = DB::select('select * from cars where uid=?',[$user_id]);
            } else {
                $cars = DB::select('select * from cars');
        } }else { 
             $cars = DB::select('select * from cars');
              }
        return view('pages.index', ['cars'=>$cars]);
    }
  /*  public function details() {
        $users = DB::select('select * from car');
        return view('pages.car-single', ['users'=>$users]);
    }  */

    public function car(Request $request,$id) {
        //$cars = DB::select('select * from cars where id=?',[$id])
        $cars = DB::table('cars')->where('cars.id','=',$id)
                            ->join('users','cars.uid','=','users.id')
                            ->select('cars.id','cars.uid','cars.brand','cars.model','cars.km','cars.seat','cars.luggage','cars.gear','cars.year','cars.city','cars.fuel','cars.price','cars.car_image','users.name','users.address','users.mobile','users.email')
                            ->get();     
        return view('pages.car-single', compact('cars'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cars = car::find($id);
        // check for correct user
        if(auth()->user()->id !==$cars->uid){
            return redirect()->back()->with('alert', 'Unauthorized Page!!!');
        }
        Storage::delete('public/images/'.$cars->car_image);
        $cars->delete();
       // DB::delete('delete from cars where id = ?',[$id]);
        return redirect()->back()->with('alert', 'Car Deleted Sucessfully!');
    }
    public function filter(Request $request)
    {
         $brand = $request->input('brand');
         $model = $request->input('model');
         $city = $request->input('city');
        if($brand==NULL && $model ==NULL){
            $cars = DB::select('select * from cars where city=?',[$city]);
        }else if($city==NULL && $model==NULL){
            $cars = DB::select('select * from cars where brand=?',[$brand]);
        }else if($city==NULL){
            $cars = DB::select('select * from cars where brand=? AND model=?',[$brand, $model]);
        } else {
            $cars = DB::select('select * from cars where city=? AND brand=? AND model=?',[$city, $brand, $model]);
        }
        // $cars = DB::select('select * from cars where city=? AND brand=? AND model=?',[$city, $brand, $model]);
        // $cars = DB::table('cars')->where('city','=',$city)->orWhere('brand','=',$brand)->get();
        // $cars = DB::table('cars')->where('city','=',$city)->get();
         return view('pages.car', ['cars' => $cars]);
    }
 }
