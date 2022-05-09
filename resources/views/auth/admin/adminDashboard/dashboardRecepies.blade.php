@extends('layouts.dashboard')
@section('content')
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
@endsection