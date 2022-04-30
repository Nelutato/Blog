@extends('layouts.app')
@section('content')

    <script>
        function Change(wich) {
            var info = document.getElementById(wich);
            var change = document.getElementById('change' + wich);

            if (info.style.display === "none") {
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
                <h3> Witaj <b>{{ $LogedUserInfo['name'] }} </b></h3>
            </div>

            <div class="col-md-3 m-1">
                <form action="{{ route('logout', ['user' => $LogedUserInfo['id']]) }}" method="post">
                    @csrf
                    <button type="submit" class="btn border border-danger">
                        Wyloguj
                    </button>
                </form>
            </div>
        </div>

        <div class="row d-flex justify-content-center m-1">
            <div class="col-md-6 m1 border p-2">

                @if ($errors->any())
                    <div class="bg-dark text-light p-1">
                        @foreach ($errors->all() as $error)
                            {{ $error }} <br>
                        @endforeach
                    </div>
                @endif

                @if (Session::get('change'))
                    <div class="bg-own-green">
                        {{ Session::get('change') }}
                    </div>
                @endif

                <div class="d-flex justify-content-center m-1 p-1">
                    <img src="{{ URL('images/logo.jpg') }}" alt="Prof"
                        class=" img-flex w-25 h-25 rounded-pill border-color-yellow">
                </div>
                <div class="w-100 border"></div>

                Username : <br>
                <i id="UserName"> {{ $LogedUserInfo['name'] }} </i>
                <form action="{{ route('update.name') }}" method="POST" id="changeUserName" style="display: none">
                    @method('PUT')
                    @csrf
                    <input type="text" name="name" id="name" required>
                    <button type="submit" class="btn border">
                        Zmień
                    </button>
                </form>
                <i class="bi bi-gear m-1" onclick="Change('UserName')">c</i> <br>
                <div class="w-100 border my-1"></div>

                e-mail : <br>
                <i id="UserEmail"> {{ $LogedUserInfo['email'] }} </i>
                <form action="{{ route('update.email', ['user' => $LogedUserInfo['id']]) }}" method="post"
                    id="changeUserEmail" style="display: none">
                    @method('PUT')
                    @csrf
                    <input type="text" name="email" id="email" required>
                    <button type="submit" class="btn border">
                        Zmień
                    </button>
                </form>
                <i class="bi bi-gear m-1" onclick="Change('UserEmail')">C</i> <br>
                <div class="w-100 border my-1"></div>

                Użytkownik od : <br>
                <i> {{ $LogedUserInfo['created_at'] }} </i>
                <div class="w-100 border my-1"></div>

                Usuń konto <br>
                <form action="{{ route('uesr.delete') }}" method="post"
                    id="changeUserEmail">
                    @method('delete')
                    @csrf
                    <input type="checkbox" name="sure" id="sure" required> 
                    <i> Jestem pewny że chce usunąć konto </i> <br>
                    <button type="submit" class="btn border">
                        usuń
                    </button>
                </form>

                <div class="w-100 border my-1"></div>
            </div>
        </div>

        <div class="row m-2 p-1 justify-content-center border border-2 d-flex">
            <h4> Twoje przepisy:</h4>
            @foreach ($ownRecepies as $Recepie)
                <div class="col-md-3 m-2 p-2 admin-recepies-image text-center">
                    <a href="{{ url( 'Recepie.show',['slug'=> $Recepie['id']] ) }}" class="text-decoration-none">
                        <img src="{{ asset('images/'. $Recepie['image']) }}" alt="Img" class="img-fluid rounded w-50"> <br>
                        <b>{{ $Recepie['title'] }}</b>
                    </a>
                </div>
            @endforeach

            <div class="col-md-1 my-auto d-flex justify-content-center text-center p-3 ">
                <a href="{{ route('Recepie.create') }}" class="m-3 p-2">
                    <i class="bi bi-plus-lg p-3 m-2 border">+</i>
                </a>
            </div>
        </div>

    </div>

@endsection
