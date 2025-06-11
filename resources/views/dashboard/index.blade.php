@extends('dashboard/layouts/main')

@section('title', "Dashboard")

@section('container')
@section('section title', "Welcome, " . Auth::user()->name . "!" )
    
@endsection