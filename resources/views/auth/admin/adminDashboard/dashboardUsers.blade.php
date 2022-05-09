@extends('layouts.dashboard')
@section('content')
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="container-flex">
        <div class="row m-2 p-1">
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
    </div>
    </div>
@endsection