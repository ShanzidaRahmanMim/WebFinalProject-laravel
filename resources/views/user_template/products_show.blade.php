@extends('user_template.layouts.template') 
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="box_main">
                <div class="tshirt_img">
                    <img src="{{asset($product->product_img)}}" alt="">
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="box_main">
            <div class="product-info">
            <h4 class="shirt_text text-left">{{$product->product_name}}</h4>
            <p class="price_text text-left">price <span style="color:#262626;">tk {{$product->price}}</span></p>
            </div>
            <div class="my-3 product-details">
                <p class="lead">
                    {{$product->product_long_des}}
                </p>
                <ul class="p-2 bg-light my-2">
                    <li>Category-{{$product->product_category_name}}</li>
                    <li>Short Description-{{$product->product_short_des}}</li>
                    <li>Available quantity-{{$product->quantity}}</li>
                </ul>
            </div>
            <div class="btn_main">
                <form action="{{route('addproducttocart')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$product->id}}" name="product_id">
                    <div class="form-group">
                    <input type="hidden" value="{{$product->price}}" name="price">
                    <label for="quantity">Enter Amount To Order</label>
                    <input class="form-control" type="number" min='1' placeholder="0" name="quantity">
                    </div>
                    <br>
                   <input class="btn btn-warning" type="submit" value="Add To cart"> 
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection