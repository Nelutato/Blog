@extends('layouts.dashboard')
@section('content')
    <div class="row m-1">
        <form action="{{ route('admin.search', ['where'=> 'Recepie']) }}">
        @csrf
            <input type="number" name="id" id="">
            <button type="submit" class="btn border">
                Szukaj 
            </button>
        </form>
    </div>
    
    <div class="row m-1">
        <div class="col-md-8 d-flex justify-content-center mx-auto my-2">
            <table>    
                <tr>
                    <th> id</th>
                    <th> tytuł </th>
                    <th> Stwożone przez: </th>
                    <th> Utworzony </th>
                    <th> Opinia </th>
                    <th> Usuń </th>
                </tr>
                @forelse ($recepies as $recepie)
                    <tr>
                        {{-- {{ dd($recepie) }} --}}
                        <td>{{ $recepie['id'] }}</td>
                        <td>{{ $recepie['title'] }}</td>
                        <td>{{ $recepie->user->name }}</td>
                        <td>{{ $recepie['created_at'] }}</td>
                        <td>{{ round(($recepie['taste']+$recepie['speed']+$recepie['speed'])/3, 2) }}</td>
                        <td>
                            <form action="{{ route( 'admin.delete', [ 'id' => $recepie['id'], 'who' => 'Recepie' ] ) }}" method="POST">
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
@endsection