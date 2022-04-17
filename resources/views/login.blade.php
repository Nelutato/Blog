
@include('layouts/navbar')
<div class="container-flex ">
    <div class="row bg-secondary justify-content-center text-warning">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <br> {{ $error }}
            @endforeach
        @endif

        @if(Session::get('fail'))
            {{ Session::get('fail') }}
        @endif

    </div>
 <div class="row my-2  d-flex justify-content-center">

    <div class="col-md-4 p-2 border m-4 my-auto">
        <form action="{{route('users.logIn')}}" method="POST" class="">
            @csrf
            <h3>login</h3>
            <div class="m-2">
                <label for="logInUser" class="form-label">username:</label>
                <input type="text" name="username" id="LogInUser" class="form-control" required>
            </div>
            <div class="m-2">
                <label for="UserPassword">Password:</label>
                <input type="password" name="password" id="UserPassword" class="form-control" required>
            </div>
            <div class="d-flex justify-content-center my-3">
                <button class="btn bg-own-yellow" type="submit">log in</button>
            </div>
        </form>
    </div>


    <div class="col-md-4 p-2 border m-4">
        <form action="{{ route('users.store') }}" method="POST" >
            @csrf
            <h3>Register</h3>
            <div class="m-2">
                <label for="userEmail" class="form-label">E-mail:</label>
                <input type="email" name="email"  id="userEmail" class="form-control" aria-describedy="emailHelo" required>
            </div>
            <div class="m-2">
                <label for="logInUser" class="form-label">username:</label>
                <input type="text" name="username"  id="LogInUser" class="form-control" required>
            </div>
            <div class="m-2">
                <label for="UserPassword">Password:</label>
                <input type="password" name="password"  id="UserPassword" class="form-control" required>
            </div>
            <div class="m-3">
                <input type="checkbox" required>
                <label for="AcceptTermOfUse">i accept Term of use 
                    <a href="termOfUsage">more...</a>
                </label>  
            </div>
            <div class="d-flex justify-content-center my-3">
                <button class="btn bg-own-yellow" type="submit">Register</button>
            </div>
        </form>
    </div>

 </div>
</div>