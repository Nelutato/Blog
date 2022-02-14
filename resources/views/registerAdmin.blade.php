@include('layouts/navbar')

<div class="col-md-4 p-2 border m-4">
    <form action="/admin/registerAdminAccount" method="POST" >
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