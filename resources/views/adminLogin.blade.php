@include('layouts/navbar')
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
    
<h1>- Its restricted site for main writers </h1>
<div class="row my-2  d-flex justify-content-center">

    <div class="col-md-4 p-2 border m-4 my-auto">
        <form action="/admin/login" method="POST" >
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
        <a href="/admin/registerform">register</a>
    </div>


    
    </div>
