@include('layouts/navbar')

<div class="container-flex">
    <div class="row d-flex justify-content-between m-1">
        <div class="col-md-3  "> 
           <h1> witaj  {{$LogedAdminInfo['username']}}</h1>   
        </div>
        <div class="col-md-1  my-auto">
            <a href="logout"> Logout</a>
        </div>
    </div> <br>
    



</div>