@include('layouts/navbar')

<div class="container-flex">
    <div class="row d-flex justify-content-between p-1 m-2">
        <div class="col-md-3 m-1"> 
            <h3> Witaj  <b>{{$LogedUserInfo['name']}} </b></h3>
        </div>
        <div class="col-md-3 m-1"> 
            <a href="logout"> Wylogój</a>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 m1 border p-2">    
            <div class="d-flex justify-content-center m-1 p-1"> 
                <img src="{{URL('images/logo.jpg')}}" alt="Prof" 
                class=" img-flex w-25 h-25 rounded-pill border-color-yellow">
            </div>
            <div class="w-100 border"></div>
            Username : <br>
                <i> {{ $LogedUserInfo['name'] }} </i><br>
            <div class="w-100 border"></div>
            e-mail :  <br>
                <i> {{ $LogedUserInfo['email'] }} </i> <br>
            <div class="w-100 border"></div>
            Użytkownik od : <br>
                <i> {{$LogedUserInfo['created_at']}} </i>
            <div class="w-100 border"></div>
        </div>
    </div>
</div>