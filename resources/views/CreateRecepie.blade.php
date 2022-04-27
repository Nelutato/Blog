@extends('layouts.app')
@section('content')

    <div class="container d-flex justify-content-center">
        @if ($errors->any())
            <div class="bg-dark m-1 p-1 text-own-yellow">
                @foreach ($errors->all() as $err)
                    {{ $err }} <br>
                @endforeach
            </div>
        @endif
        <div class="col-md-3 text-center">
            <form action="{{ route('Recepie.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                Title: <br>
                <input type="text" name="title" id=""> <br>
                Img: <br>
                <label for="image">
                    <input type="file" name="image" id="image" class="from-control" hidden>
                    <span class="img-thumbnail " id="addImage">+</span>
                </label> <br>
                ingredients: <br>
                <div id="ingredients">
                    <input type="text" name="ingredients[0]" id=""> 
                    <div class="btn border" onclick="addIngredient()"> + </div> <br>
                </div>
                body: <br>
                <textarea name="body" id="body" cols="30" rows="10">
                </textarea><br>
                <button type="submit" class="btn btn-primary m-1"> post </button>

            </form>
        </div>
    </div>
@endsection
