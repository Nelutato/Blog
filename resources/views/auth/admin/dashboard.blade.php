@extends('layouts.app')
@section('content')
    <div class="container-flex">
        <div class="row m-1">
            <a href="{{ route('admin.index') }}" class="link-dark text-decoration-none m-2 w-25"> 
                <h1> <- </h1> 
            </a>
        </div>
        <div class="row m-1">
            <div class="col-md-8  m-auto d-flex justify-content-center">
                <table>    
                    <tr>
                        <th>Nazwa Użytkownika </th>
                        <th>Email </th>
                        <th>Utworzony </th>
                        <th>Admin</th>
                        <th> Usuń </th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['created_at'] }}</td>
                            <td>
                                @if($user['is_admin'] == true)
                                    Tak
                                @else
                                    Nie
                                @endif
                            </td>
                            <td>
                                <form action="{{ route( 'admin.deleteUser', [ 'id' => $user['id'] ] ) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn border"> 
                                    Usuń
                                    </button>
                                </form>
                            </td>
                        </tr>    
                    @endforeach
                </table>
            </div>
        </div>
        
        <div class="row m-1">
            <div class="col-md-8 d-flex justify-content-center mx-auto my-2">
                <table>    
                    <tr>
                        <th> tytuł </th>
                        <th> Stwożone przez: </th>
                        <th> Utworzony </th>
                        <th> Opinia </th>
                        <th> Usuń </th>
                    </tr>
                    @foreach ($recepies as $recepie)
                        <tr>
                            <td>{{ $recepie['title'] }}</td>
                            <td>{{ $recepie->user->name }}</td>
                            <td>{{ $recepie['created_at'] }}</td>
                            <td>{{ round(($recepie['taste']+$recepie['speed']+$recepie['speed'])/3, 2) }}</td>
                            <td>
                                <form action="{{ route( 'admin.deleteUser', [ 'id' => $recepie['id'] ] ) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn border"> 
                                    Usuń
                                    </button>
                                </form>
                            </td>
                        </tr>    
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection