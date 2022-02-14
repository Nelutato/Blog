@include('layouts/navbar')

<div class="container-flex">
    <div class="row d-flex justify-content-center">
        <div class="col-md-3 m-1"> 
            <h1> user view </h1>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 m1">
            <table >
                <thead>
                    <th>ID</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>password</th>
                </thead>
                <tbody >
                    <tr>
                        <td style="border:1px solid black;">{{ $LogedUserInfo['id'] }}</td>
                        <td style="border:1px solid black;" >{{ $LogedUserInfo['name'] }}</td>
                        <td style="border:1px solid black;" >{{ $LogedUserInfo['email'] }}</td>
                        <td style="border:1px solid black;">{{ $LogedUserInfo['password'] }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="logout"> Logout</a>
        </div>
    </div>
</div>