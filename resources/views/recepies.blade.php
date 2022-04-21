@extends('layouts.app')
@section('content')

<div class="container-fluid" >

{{-- @include('components.Search-Sort')                 --}}

  @foreach ($Recepies as $recepie)
    <?php
      $recepieBody = substr($recepie['body'],0,250);
      $ingredient = explode(',', $recepie["ingredients"] );
      $lenght = count( $ingredient );
    ?>

    <div class="row justify-content-center  bg-light m-2 own-hover-border">
      <div class="col-md-6 text-center p-1 mx-2 bg-light text-md-start">
        
        <h1 class="d-inline bg-light m-1">
          {{ $recepie['title'] }}
        </h1>

        <small class="float-end"> {{$recepie['created_at']}} </small> <br>
        {{$recepieBody}} <br>

        <b id="ingredients"> Składniki : </b> <br>
        <ul class=" bg-light">
          @for($i=0; $i < $lenght; $i++)
            @if ($i==2) 
              @break @endif
            <li> {{ $ingredient[$i] }} </li>
          @endfor
        </ul>

        <a class="bg-light" href="{{ route('Recepie.show',$recepie) }}">
          <button type="button" class="btn bg-own-green float-end">
            Więcej ...
          </button>
        </a>
        
      </div>

      <div class="col-md-3 text-center bg-light mx-3">
        <img src="{{ asset('images/'. $recepie['image']) }}" 
            alt="IMG" class="img-fluid " 
            style="height: 250px ;width: 300px"
            >
      </div> 
 
    </div>
  @endforeach
</div>
@endsection