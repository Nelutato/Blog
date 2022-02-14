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
    
    <div class="row m-2 justify-content-center border border-2 d-flex">
        <h4> Your Posts :</h4>
        
            @for ($i = 0; $i < 3; $i++)
            @if ( isset($ownRecepies[$i]) )
                <div class="col-md-3 m-2  admin-recepies-image text-center">
                    <img src="{{ asset('images/'.$ownRecepies[$i]['image']) }}" 
                    alt="IMG" class="img-fluid"
                    style="height: 300px">
                    <h5>{{ $ownRecepies[$i]['title'] }} </h5>
                </div>
                @endif
            @endfor
        
        <div class="col-md-1 my-auto d-flex justify-content-center text-center ">
            <a href="/admin/recepieCreate" >
                <i class="bi bi-plus-lg p-3 border"></i>
            </a>
        </div>
    </div>


</div>