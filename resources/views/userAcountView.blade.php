@include('layouts/navbar')

<script>
    function Change(wich)
    {
      var info = document.getElementById(wich);
      var change = document.getElementById('change'+wich);

        if (info.style.display === "none") 
        {
            info.style.display = "inline-flex";
            change.style.display = "none";
        } else {
            info.style.display = "none";
            change.style.display = "inline-flex";
        }
    }
</script>

<div class="container-flex">

    <div class="row d-flex justify-content-between p-1 m-2">
        <div class="col-md-3 m-1"> 
            <h3> Witaj  <b>{{$LogedUserInfo['name']}} </b></h3>
        </div>

        <div class="col-md-3 m-1"> 
            <a href="logout"> Wyloguj</a>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-md-6 m1 border p-2">  

            @if($errors->any())
                <div class="bg-dark text-light p-1"> 
                    @foreach ($errors->all() as $error)
                        {{ $error }}  <br>
                    @endforeach
                </div>
            @endif

            @if(Session::get('change'))
                <div class="bg-own-green">
                    {{Session::get('change')}}
                </div>
            @endif

            <div class="d-flex justify-content-center m-1 p-1"> 
                <img src="{{URL('images/logo.jpg')}}" alt="Prof" 
                class=" img-flex w-25 h-25 rounded-pill border-color-yellow">
            </div>
            <div class="w-100 border"></div>

            Username : <br>
                <i id="UserName"> {{ $LogedUserInfo['name'] }} </i> 

                <form action="update/{{$LogedUserInfo['id']}}" method="POST" id="changeUserName" style="display: none">
                @method('PUT')
                @csrf
                    <input type="text" name="username" id="username" required>
                    <button type="submit" class="btn border">
                         Zmień
                    </button>
                </form>
                
                <i class="bi bi-gear m-1" onclick="Change('UserName')"></i> <br>
            <div class="w-100 border"></div>

            e-mail :  <br>
                <i id="UserEmail"> {{ $LogedUserInfo['email'] }} </i> 

                <form action="update/{{$LogedUserInfo['id']}}" method="post" id="changeUserEmail" style="display: none">
                @method('PUT')
                @csrf
                    <input type="text" name="email" id="email" required>
                    <button type="submit" class="btn border">
                         Zmień
                    </button>
                </form>

                <i class="bi bi-gear m-1" onclick="Change('UserEmail')"></i> <br>
            <div class="w-100 border m-1"></div>

            Użytkownik od : <br>
                <i> {{$LogedUserInfo['created_at']}} </i> 
            <div class="w-100 border"></div>
        </div>
    </div>
</div>