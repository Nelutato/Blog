<?php
// print_r($Recepie);

$recepie = $Recepie[0];
for($i=0; $i<3;$i++)
{
  $ingredient = array();
  $recepieBody[$i] = substr($Recepie[$i]['body'],0,250);
  $ingredient = explode(',', $Recepie[$i]["ingredients"] );

  // $lenght[$i] = count( $ingredient);

  // if($lenght > 3)
  // {
  //   $lenght=3;
  // }
}
?>

<script> 
 i=0;
 function changeSlide(wich)
  {
    if(wich == "UP" && i!= 3)
    {
      i++;
    }else if(wich == "DOWN" && i !=0 ){
      i--;
    }else if(wich=="DOWN"){
      i=3;
    }else{
      i=0;
    }                   // za dużo if elseif etc. popraw to !!!!!!!!!!!!!!!! 

    var Recepie = <?php  echo json_encode($Recepie); ?>;

    document.getElementById("title").innerHTML = Recepie[i]['title']; 
    
  }

</script>

<body >
@include('layouts/navbar')

<div class="container-fluid">

  <div class="row m-2 text-center">
    <h1>Ostatnio dodane przepisy : </h1>
  </div>


  <div class="row justify-content-center bg-light border m-2 border-2">
    <div class="float-end col-md-1 my-auto bg-light" onclick='changeSlide("UP")'>
      <h1 class="bg-light text-center "> 
        <i class="bi bi-chevron-left bg-light"></i>
      </h1>
    </div> 

    <div class="col-md-5 p-1 bg-light text-md-start">
      <h1 id ="title" class="d-inline bg-light m-1 " >
        {{ $recepie['title'] }}
      </h1>
      <small class="float-end"> {{$recepie['created_at']}} </small> <br>
      {{$recepieBody[0]}} <br>

      <b id="ingredients"> Składniki : </b> <br>
        <ul class=" bg-light">
          {{-- @for($i=0; $i < $lenght; $i++)
            <li>  $ingredient  </li>
          @endfor --}}
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

    <div class="float-end col-md-1 my-auto bg-light " onclick='changeSlide("DOWN")'>
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