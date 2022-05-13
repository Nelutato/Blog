@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __('Service Unavailable'))
<a href="{{ route('home') }}">
    return to the home page 
</a>