@extends('layouts.app')
@section('content')

<body onload='changeSlide("none")'>
  <div class="container-fluid" >

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
            Title
        </h1>
        <small id="created_at" class="float-end"> date </small> <br>
        <i id="recepieBody"> body </i><br>

        <b id="ingredients"> Składniki : </b> <br>
          <ul class=" bg-light" id="ingredients_list">
              <li>  skladnik  </li>
          </ul>
            <a id="moreButton" href="" class=" bg-light">
              <button type="button" class="btn bg-own-green float-end">
                Więcej ...
              </button>
            </a>

      </div>

      <div class="col-md-3 text-center bg-light">
        <img id="recepieImage" class="img-fluid "  
            src="" 
            style="height: 300px ;width: 350px" alt="IMG">
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

</body>
@endsection

{{--  SCRIPT SECTION  --}}
<script> 
  i=0;
  var Recepie = <?php  echo json_encode($Recepie); ?>;
 
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
     }      
 
     var adDate = new Date(Recepie[i]['created_at']);
 
     document.getElementById("title").innerHTML = Recepie[i]['title']; 
     document.getElementById("recepieBody").innerHTML = Recepie[i]['body'].substr(0,150); 
     document.getElementById("created_at").innerHTML = adDate.toDateString();
     document.getElementById("ingredients_list").innerHTML = Recepie[i]['ingredients'].split(',');
     document.getElementById("moreButton").href = "/Recepies/Wiew/"+Recepie[i]['id'];
     document.getElementById("recepieImage").src= "http://localhost:8000/images/"+Recepie[i]['image'];
   }
 </script>



