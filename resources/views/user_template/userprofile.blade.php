@extends('user_template.layouts.user_profile_template')
@section('profilecontent')
<h2>Dashboard</h2>
<h3>Confirmed Orders</h3>

<table class="table">
    <tr>
        <th>Product Id</th>
        <th>Price</th>
    </tr>
    @foreach($confirmed_orders as $order)
    <tr>
        <td>{{ $order->product_id }}</td>
        <td>{{ $order->total_price }}</td>
    </tr>
    @endforeach
</table>

@endsection