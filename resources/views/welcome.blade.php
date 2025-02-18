@extends('layout.master')

@section('title', 'Home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
    <h1>Welcome to the Home Page</h1>
    <p>This is the home page of our website.</p>
@endsection
