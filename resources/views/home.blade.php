<?php
$recepie = $Recepie;
$recepieBody = substr($recepie['body'],0,250);
$ingredient = explode(',', $recepie["ingredients"] );
$lenght = count( $ingredient );
?>
<script> 
  // "<?php echo $recepie; ?>"
  function changeSlideUP()
  {
  document.cookie = "slide";
  }

</script>

<body>
@include('layouts/navbar')
<div class="container-fluid">

  <div class="row m-2 text-center">
    <h1>Ostatnio dodane przepisy : </h1>
  </div>


  <div class="row justify-content-center bg-light border m-2 border-2">
    <div class="float-end col-md-1 my-auto bg-light ">
      <h1 class="bg-light text-center "> 
        <i class="bi bi-chevron-left bg-light"></i>
      </h1>
    </div> 

    <div class="col-md-5 p-1 bg-light text-md-start">
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
          style="height: 300px ;width: 350px"
          >
    </div> 

    <div class="float-end col-md-1 my-auto bg-light ">
      <h1 class="bg-light text-center "> 
        <i class="bi bi-chevron-right bg-light"></i>
      </h1>
    </div> 
  </div>

          {{-- blog  --}}
  <div class="row m-2 text-center">
    <h1>Ostatnio dodane wpisy : </h1>
  </div>

    <div class="row justify-content-center bg-light border border-2 my-3">
      <div class="float-start col-md-1 my-auto bg-light ">
          <h1 class="bg-light text-center "> 
            <i class="bi bi-chevron-left bg-light"></i>  
          </h1>
      </div>
      <div class="col-md-5 text-center p-1 bg-light text-md-start">
        <h1 class="bg-light m-1">Last Post :</h1>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Asperiores eligendi consequatur dolorum ipsum architecto aut illum consectetur sint optio nisi corporis deserunt, iste possimus animi earum, fugiat, modi nesciunt.Animi consequatur quae modi! Cupiditate illum laudantium magnam facilis natus? Neque!
        <a href="#" class=" bg-light"> Read More . . . </a>
      </div>
      <div class="float-end col-md-1 my-auto bg-light ">
          <h1 class="bg-light text-center "> 
            <i class="bi bi-chevron-right bg-light"></i>
          </h1>
      </div>

      <div class="col-md-3 bg-light">
        <img src="{{URL('images/Test-Blog.jpeg')}}" alt="" class="img-fluid ">
      </div>

    </div>

</div>

<footer class="text-center">
  Coppyright Patryk Wojcik 2021-2022<br/>
  Contackt :
  <a href="#" class="link-secondary"> <i class="bi bi-phone-vibrate"></i> </a> 
  <a href="#" class="link-secondary"> <i class="bi bi-github"></i>  </a>
  <a href="#" class="link-secondary"> <i class="bi bi-envelope"></i> </a>
</footer>
</body>
</html>

{{-- <div class="float-end col-md-1 my-auto bg-light ">
  <h1 class="bg-light text-center "> 
    <i class="bi bi-chevron-right bg-light"></i>
  </h1>
</div> --}}