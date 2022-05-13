@extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests'))
<a href="{{ route('home') }}">
    return to the home page 
</a>