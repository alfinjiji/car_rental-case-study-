<?php

namespace App\Http\Controllers;

use App\order;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth::user()->type==1)
        {
        $orders = DB::table('orders')
        ->where('orders.user_id','=',auth::user()->id)
        ->join('cars','orders.car_id','=','cars.id')
        ->join('users','cars.uid','=','users.id')
        ->select('orders.id','orders.pickup_date','orders.dropoff_date','orders.total','cars.brand','cars.model','cars.car_image','users.name','users.address','users.mobile')
        ->get();
        return view('pages.order-details',  compact('orders'));
        }
        if(auth::user()->type==2)
        {
        $orders = DB::table('orders')
        ->where('orders.rental_id','=',auth::user()->id)
        ->join('cars','orders.car_id','=','cars.id')
        ->join('users','orders.user_id','=','users.id')
        ->select('orders.id','orders.pickup_date','orders.dropoff_date','orders.total','cars.brand','cars.model','cars.car_image','users.name','users.address','users.mobile')
        ->get();
        return view('pages.order-details',  compact('orders'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new order;
        $order->car_id = $request->car_id;
        $order->rental_id = $request->rental_id;
        $order->user_id = $request->user_id;
        $order->pickup_date = $request->pickup_date;
        $order->dropoff_date = $request->dropoff_date;
        $order->total = $request->total;
        $order->save();
        return redirect()->back()->with('alert', 'Your Order Has Been Submitted Sucessfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cars = DB::table('cars')->where('cars.id','=',$id)->get();
        return view('pages.order', ['cars' => $cars]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cancel($id)
    {
        DB::delete('delete from orders where id = ?',[$id]);
        return redirect()->back()->with('alert', 'Order Canceled!');
    }
}
