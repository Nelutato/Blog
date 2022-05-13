@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('Unauthorized'))
<a href="{{ route('home') }}">
    return to the home page 
</a>
