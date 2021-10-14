<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Mail\DeliveryCreated;
use Illuminate\Support\Facades\Mail;


class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return  Delivery::get();
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
        $delivery=Delivery::create([
            'name' => $request->name,
            'user_id' =>$request->user_id,
            'sender_address' => $request->sender_address,
            'delivery_address' => $request->delivery_address,
            'email' => $request->email,
            'phone' => $request->phone,
            'pick_up_time' =>$request->pick_up_time
        ]);
         Mail::to($delivery->email)->send(new DeliveryCreated($delivery));
         return 'Email Has been Send and your delivery id is ' . $delivery->id;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $item= Delivery::find($request->id);
        return $item;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $item= Delivery::find($request->id);
        return $item;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivery $delivery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
        //
    }
    public function SendEmailToReciver($id) {

        $delivery = Delivery::find($id);
        
        Mail::to('muhammadimran5236@gmail.com')->send(new DeliveryCreated($delivery));
        return "Emai has been sent";
    }
    public function getCurrentUserOrders() {
        $user = $request->user();
        $deliveres = Delivery::where('user_id', $user->id)->get();
        return $deliveres;
    }
}
