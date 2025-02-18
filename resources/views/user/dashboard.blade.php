@extends('layout.master')

@section('title', 'Log-in')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
<h1>User Dashboard</h1>
<div class="container-fluid">
    <div class="row" id="sidebar">
        <div class="col-md-2">
            <ul class="list-group">
                <li class="list-group-item category" data-url="/get-category">Category</li>
                <li class="list-group-item" data-url="/get-product">Product</li>
            </ul>
        </div>
        <div class="col-md-10" id="tab">
            Welcome
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endsection
