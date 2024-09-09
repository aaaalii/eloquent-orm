@extends('layout');

@section('title')
    Student Details
@endsection

@section('content') 
    <h2>{{ $data->name }}</h2>
    Age: {{ $data->age }} <br>
    City: {{ $data->city }} <br>
@endsection