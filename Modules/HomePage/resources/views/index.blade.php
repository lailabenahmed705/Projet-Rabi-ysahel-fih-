@extends('homepage::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('homepage.name') !!}</p>
@endsection
