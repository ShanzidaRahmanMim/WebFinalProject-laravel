<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function Index()
    {   
        $pending_orders=Order::where('status','pending')->latest()->get();
         return view('admin.pendingorder',compact('pending_orders'));
    }

    public function confirmOrder($id)
    {
    $order = Order::findOrFail($id);
    $order->status = 'confirmed';
    $order->save();

    return redirect()->back()->with('message', 'Order confirmed successfully.');
    }

    public function removeOrder($id)
{
    $order = Order::findOrFail($id);
    $order->delete();

    return redirect()->back()->with('message', 'Order removed successfully.');
}
  
}

