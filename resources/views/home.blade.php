
<body>
@include('layouts/navbar')

  <div class="container-fluid bg-light">

    <div class="row justify-content-center bg-light p-1 border-bottom border-2 my-4">
      <div class="col-md-6 text-center bg-light p-2">
        <h1 class="bg-light">
          Welcom on our site
        </h1>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam voluptatibus repudiandae explicabo neque placeat accusamus cumque quasi, sed reprehenderit asperiores.
      </div>
    </div>

    <div class="row justify-content-center bg-light border border-2">
      <div class="float-start col-md-1 my-auto bg-light ">
          <h1 class="bg-light text-center "> 
            <i class="bi bi-chevron-left bg-light"></i>  
          </h1>
      </div>

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

      <div class="float-end col-md-1 my-auto bg-light ">
          <h1 class="bg-light text-center "> 
            <i class="bi bi-chevron-right bg-light"></i>
          </h1>
      </div>
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