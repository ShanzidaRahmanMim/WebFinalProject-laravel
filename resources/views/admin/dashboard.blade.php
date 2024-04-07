@extends('admin.layouts.template')
@section('page_title')
Dashboard - Beauty Bloom
@endsection
@section('content')
<style>
.container.center {
            display: flex;
            justify-content: center; 
            align-items: center;
            min-height: 100vh; 
            flex-direction: column; 
            text-align: center;
        }
</style>
<div class="container center" >
    <h3 style="color:black;">Hi, {{Auth::guard('web')->user()->name}}</h3><br>
    <h1 style="color:green;">Welcome to dashboard!</h1>
</div>
@endsection