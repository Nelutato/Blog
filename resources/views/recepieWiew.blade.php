@extends('layouts.app')
@section('content')
    <div class="container-flex">
        <div class=" row d-flex text-center m-2  ">


            <div class="my-1 float-start w-75">
                <h1>{{ $Recepie['title'] }}</h1> <br>
                <a href="{{ route('subCreateForm', $Recepie['id']) }}" class="linkFont">
                    <button class="btn border bg-own-yellow ">
                        Edytuj
                    </button>
                </a>
                <a href="{{ route('Recepie.list', $Recepie['primary']) }}" class="linkFont">
                    <button class="btn border bg-own-yellow ">
                        przeglądaj inne wersje
                    </button>
                </a>
            </div>

            <div class="w-25">
                <form action="{{ route( 'Recepie.opinion', ['slug'=> $Recepie['id']] ) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="text" name="id" value="{{ $Recepie['id'] }}" hidden>
                    <i class="bi bi-piggy-bank"></i>
                    <select name="price" id="price">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select> <br>
                    <i class="bi bi-stopwatch"></i>
                    <select name="speed" id="speed">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select> <br>
                    <i class="bi bi-egg-fried"></i>
                    <select name="taste" id="taste">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select> <br>
                    <button type="submit" class="btn bg-own-yellow">
                        Confirm
                    </button>
                </form>
            </div>
        </div>

        <div class="row mx-auto  my-2 justify-content-center">

            <div class="col-md-3  p-2 border-top border-3">
                <p> składniki : <br></p>
                <ul>
                    <?php
                    $ingredient = explode(',', $Recepie['ingredients']);
                    $lenght = count($ingredient);
                    ?>
                    @for ($i = 0; $i < $lenght; $i++)
                        <li> {{ $ingredient[$i] }} </li><br>
                    @endfor
                </ul>
            </div>
            <div class="col-md-3  p-2 border-top border-3 ">
                stwożone przez: <br>
                <b> {{ $creatorName }} </b>
            </div>

            <div class="col-md-2 my-1">
                <img src="{{ URL('images/' . $Recepie['image']) }}" alt="IMG" class="img-fluid "
                    style="max-height: 300px">
            </div>

            <div class="col-md-6  border-top p-2 m-1">
                {{ $Recepie['body'] }} <br>
                <i>Lorem ipsum dolor,sit amet consectetur adipisicing elit. Necessitatibus, exercitationem! Pariatur, minima?
                Natus itaque facilis quisquam ipsum officia maiores quas voluptatibus qui quis. Sequi tempora corporis
                provident reprehenderit voluptates. Facere fugiat esse dolorem consequuntur doloribus quod ducimus obcaecati
                quis aut libero. Ducimus molestiae quasi dignissimos ad officia explicabo quae, asperiores ipsam et magni
                quia aliquam exercitationem rem dolorum nemo aperiam!</i>
            </div>
        </div>

        {{-- coment Section --}}

        <div class="row m-3 p-2 border-top justify-content-center">
            
                <div class="col-md-4 border p-2">
                    @Auth
                        <form action={{ url('/Recepies/addComent/' . $Recepie['id']) }} method="post">
                            @csrf
                            <img src="{{ URL('images/honeycomb.ico') }}" width="6%" class=" border rounded-circle m-1">
                            {{ Auth::user()->name }} :
                            <textarea name="comment" id="comment" class="form-control" rows="2"> </textarea>
                            <div class="my-1">
                                <button type="submit" class="btn btn-success float-end m-1">
                                    skomętuj
                                </button>
                            </div>
                        </form>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <br> {{ $error }}
                            @endforeach
                        @endif
                    @endauth
                    @guest
                       <b class="m-2"> Need to log in to add coment </b>
                    @endguest
                </div>
            
        </div>
        <!-- prettier-ignore Oh why that dosn't work :( ) -->

        @forelse ($coments as $coment)
            @if ($loop->iteration == 10 || $coment['user'] == 'empty')
                @break
            @endif
            <div class="row m-2 p-2 justify-content-center ">
                <div class="col-md-4 mx-auto border p-2">
                    <small class="float-end"> {{ $coment['created_at'] }} </small> <br>
                    <img src="{{ URL('images/honeycomb.ico') }}" width="6%" class=" border rounded-circle">
                    <b> {{ $coment['user']['name'] }} : </b>
                    <div class="border my-2">
                        {{ $coment['comment'] }}
                    </div>
                </div>
            </div>
            @empty
            <div class="row m-2 p-2 text-center ">
                <h4> no coments avilable ..</h4>
            </div>
        @endforelse

</div>
@endsection
