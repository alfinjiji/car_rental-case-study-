<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use DB;
use App\order;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class userDeleteController extends Controller
{
    public function customer() {
        $usr = DB::select('select * from users where type = 1');
        return view('admin.admin-customer',['usr'=>$usr]);
    }
    public function rental() {
        $usr = DB::select('select * from users where type = 2');
        return view('admin.admin-rental',['usr'=>$usr]);
    }
    public function order() {
        $usr = DB::select('select * from orders');
        return view('admin.admin-order',['usr'=>$usr]);
    }
    public function car() {
        $usr = DB::table('cars')
        ->join('users','cars.uid','=','users.id')
        ->select('cars.id','cars.uid','cars.brand','cars.model','cars.city','cars.car_image','users.name','users.address','users.mobile')
        ->get();
        return view('admin.admin-car',  compact('usr'));
    }
    public function destroy1($id) {
        DB::delete('delete from users where id = ?',[$id]);
       // $usr = DB::select('select * from users');
        //return view('admin.admin-index',['usr'=>$usr])->with('alert', 'User Sucessfully Deleted!');
        return redirect('/admin/admin-customer')->with('alert', 'User Sucessfully Deleted!');
    }
    public function destroy2($id) {
        DB::delete('delete from users where id = ?',[$id]);
       // $usr = DB::select('select * from users');
        //return view('admin.admin-index',['usr'=>$usr])->with('alert', 'User Sucessfully Deleted!');
        return redirect('/admin/admin-rental')->with('alert', 'User Sucessfully Deleted!');
    }
    public function destroycar($id) {
        DB::delete('delete from cars where id = ?',[$id]);
        return redirect('/admin/admin-car')->with('alert', 'Car Sucessfully Deleted!');
    }
}
