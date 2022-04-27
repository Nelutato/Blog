@extends('layouts.app')
@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-md-3 text-center">
            <form action={{ route('subCreate', ['slug' => $id]) }} method="POST" enctype="multipart/form-data">
                @csrf
                <b> Title : </b><br>
                <input type="text" name="title" class="input-own"> <br>
                <b> Img : </b><br>
                <label for="image">
                    <input type="file" name="image" id="image" class="from-control" hidden>
                    <span class="img-thumbnail " id="addImage">+</span>
                </label>
                <br>
                <b> ingredients : </b> <br>
                <div id="ingredients">
                    <input type="text" name="ingredients[0]" id=""> 
                    <div class="btn border" onclick="addIngredient()"> + </div> <br>
                </div>
                <b> body : </b> <br>
                <textarea name="body" id="body" class="input-own" cols="30" rows="10">
                    </textarea><br>
                <button type="submit" class="btn btn-primary m-1"> post </button>

                @if ($errors->any())
                    <div class="bg-dark m-1 p-1 text-own-yellow">
                        @foreach ($errors->all() as $err)
                            {{ $err }} <br>
                        @endforeach
                    </div>
                @endif
            </form>
        </div>
    </div>

@endsection
