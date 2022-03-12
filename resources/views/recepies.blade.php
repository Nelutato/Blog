@include('layouts/navbar')

<div class="container-fluid" >

@include('layouts/Search-Sort')                

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
          @if(isset($recepie['edited']))
            <a href="Recepies/edited/ShowFullEdited/{{ $recepie['id'] }}" class=" bg-light">
              <button type="button" class="btn bg-own-green float-end">
                Więcej ...
              </button>
            </a>
          @else
            <a href="/Recepies/Wiew/ {{ $recepie['id'] }}" class=" bg-light">
              <button type="button" class="btn bg-own-green float-end">
                Więcej ...
              </button>
            </a>
          @endif
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