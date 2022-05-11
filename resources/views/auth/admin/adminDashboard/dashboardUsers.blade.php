@extends('layouts.dashboard')
@section('content')
    <div class="row m-1">
        <form action="{{ route('admin.search', ['where'=> 'User']) }}">
        @csrf
            <input type="number" name="id" id="">
            <button type="submit" class="btn border">
                Szukaj 
            </button>
        </form>
    </div>

    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="container-flex">
            <div class="row m-2 p-1">
                <div class="col-md-8  m-auto d-flex justify-content-center">
                    <table>    
                        <tr>
                            <th>id </th>
                            <th>nazwa użytkownika</th>
                            <th>Email </th>
                            <th>Utworzony </th>
                            <th>Admin</th>
                            <th> Usuń </th>
                        </tr>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user['id'] }}</td>
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
                                    <form action="{{ route( 'admin.delete', [ 'id' => $user['id'], 'who' => 'User' ] ) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn border"> 
                                        Usuń
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center "> <b> Empty </b> </td>
                                </tr>   
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection