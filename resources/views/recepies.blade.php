@include('layouts/navbar')

<div class="container-fluid" >

{{-- @include('layouts/Search-Sort')                end it with vue :) --}}


    {{-- <div class="row justify-content-center bg-light border my-2 border-2">
  
        <div class="col-md-5 text-center p-1 bg-light text-md-start">
          <h1 class="bg-light m-1">
            Wegan Pod Thai
          </h1>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Asperiores eligendi consequatur dolorum ipsum architecto aut illum consectetur sint optio nisi corporis deserunt, iste possimus animi earum, fugiat, modi nesciunt.Animi consequatur quae modi! Cupiditate illum laudantium magnam facilis natus? Neque!<br/>
          Components:
          <ul class=" bg-light">
            <li class=" bg-light">
              Thai sweet chili sauce
            </li>
            <li class=" bg-light">
              lime juice
            </li>
            <li class=" bg-light">
              fisch sauce
            </li>
            <li class=" bg-light">
              soy soauce
            </li>
            <a href="#" class=" bg-light"> Read More . . . </a>
          </ul>
        </div>
  
        <div class="col-md-3 text-center bg-light">
          <img src="{{URL('images/Pad-Thai-test.jpg')}}" alt="IMG" class="img-fluid " style="max-height: 300px">
        </div>

    </div> --}}


  {{--      GENERATOR   ========================================== --}}
  @foreach ($Recepie as $recepie)
    <?php
      $recepieBody = substr($recepie['body'],0,250);
      $ingredient = explode(',', $recepie["ingredients"] );
      $lenght = count( $ingredient );
    ?>
    <div class="row justify-content-center bg-light border m-2 border-2">
      <div class="col-md-5 text-center p-1 bg-light text-md-start">
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
          <a href="/Recepies/Wiew/ {{ $recepie['id'] }}" class=" bg-light">
            <button type="button" class="btn bg-own-green float-end">
              Więcej ...
            </button>
          </a>
        </ul>
      </div>

      <div class="col-md-3 text-center bg-light">
        <img src="{{ asset('images/'. $recepie['image']) }}" 
            alt="IMG" class="img-fluid " 
            style="height: 250px ;width: 300px"
            >
    </div> 
 
  </div>
@endforeach
</div>