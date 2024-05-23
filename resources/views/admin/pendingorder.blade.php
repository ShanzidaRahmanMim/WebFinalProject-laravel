@extends('admin.layouts.template')
@section('page_title')
Pending Orders - Beauty Bloom
@endsection
@section('content')
<div class="container my-6">
    <div class="card p-4">
        <div class="card-title">
            <h2 class="text-center">Pending Orders</h2>
        </div>
        <div class="card-body">

        @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
           
            <table class="table">
                <tr>
                    <th>User Id</th>
                    <th>Shipping Information</th>
                    <th>Product Id</th>
                    <th>Quantity</th>
                    <th>Total Bill</th>
                    <th>Action</th>
                </tr>
                @foreach($pending_orders as $order)
                <tr>
                    <td>{{$order->userid}}</td>
                    <td>
                        <ul>
                        <li>Phone Number - {{$order->shipping_phoneNumber}}</li>
                        <li>City - {{$order->shipping_city}}</li>
                        <li>Postal Code - {{$order->shipping_postalCode}}</li>
                        </ul>
                    </td>
                    <td>{{$order->product_id}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->total_price}}</td>
                    <td>
                        <!-- <a href="" class="btn btn-success">Confirm</a> -->
                        <form action="{{ route('admin.orders.confirm', $order->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Confirm</button>
                        </form>
                        <form action="{{ route('admin.orders.remove', $order->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                       
                    </td>
                </tr>
                @endforeach
            </table>
            
        </div>
    </div>
</div>
@endsection