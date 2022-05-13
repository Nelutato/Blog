@extends('layouts.dashboard')
@section('content')
    <div class="row m-1">
        <form action="{{ route('admin.search', ['where'=> 'Coment']) }}" method="get">
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
                    <th> Przepis</th>
                    <th> Stwożone przez: </th>
                    <th> Komętarz</th>
                    <th> Utworzony </th>
                    <th> Usuń </th>
                </tr>
                @forelse ($coments as $coment)
                    <tr>
                        <td>{{ $coment->recepie->id }}</td>
                        <td>{{ $coment->user->name }}</td>
                        <td>{{ $coment['comment'] }}</td>
                        <td>{{ $coment['created_at'] }}</td>
                        <td>
                            <form action="{{ route( 'admin.delete', [ 'id' => $coment['id'], 'who'=> 'Coment' ] ) }}" method="POST">
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