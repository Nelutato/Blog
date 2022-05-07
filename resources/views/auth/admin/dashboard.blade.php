@extends('layouts.app')
@section('content')
    <div class="container-flex">
    <div class="row p-1">
        <h1>Witaj w panelu administratora</h1>

        <div class="col-md-8  m-auto d-flex justify-content-center">
            <table>    
                <tr>
                    <th>Nazwa Użytkownika :</th>
                    <th>Email:</th>
                    <th>Utworzony :</th>
                    <th> Opcje :</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['created_at'] }}</td>
                        <td>Usuń</td>
                    </tr>    
                @endforeach
            </table>
        </div>
    </div>
    </div>
@endsection