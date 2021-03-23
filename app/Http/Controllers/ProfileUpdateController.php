<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class ProfileUpdateController extends Controller
{
    /*public function index() {
        $users = DB::select('select * from users' );
        return view('pages.manage-account', ['users'=>$users]);
    }
    public function show($id) {
        $users = DB::select('select * from users where id = ?',[$id]);
        return view('stud_update', ['users'=>$users]);
    }*/
    public function edit(Request $request,$id){
        $name = $request->input('name');
        $address = $request->input('address');
        $mobile = $request->input('mobile');
        //$data =array('name'=>$name,"address"=>$address,"mobile"=>$mobile);
       // DB::table('users')->update($data);
       // DB::table('users')->whereIn('id', $id)->update($request->all());
       DB::update('update users set name = ?, address = ?, mobile = ? where id = ?',[$name,$address,$mobile,$id]);
       return redirect()->back()->with('alert', 'User Profile Updated Sucessfully');
    }
}
