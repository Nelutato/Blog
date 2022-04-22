@extends('layouts.app')
@section('content')
    {{-- {{ dd($Recepie[0]['primary']) }} --}}
    <div class="row text-center">
        <h1>{{ $Recepie[0]['title'] }}</h1>
    </div>
    @for ($i = 0; $i < 9; $i = $i + 3)
        <div class="row d-flex justify-content-center m-1">
            @for ($j = 0; $j < 3; $j++)
                <?php $num = $j + $i; ?>
                @if (isset($Recepie[$num]))
                    <div class="col-md-3 border m-1 d-inline" id="editedRecepieBlock">
                        <a href="{{ route('Recepie.show', [$Recepie[$num]['id']]) }}" class="linkFont-Black">

                            <div class="w-75 float-start borderBottom-color-yellow ">
                                Ingridients : <br>
                                {{ $Recepie[$num]['ingredients'] }}
                            </div>

                            <div class="w-25 float-end">
                                @if ($Recepie[$num]['image'] == 'none')
                                    <img src="{{ URL('images/Test_icon.png') }}" class="img-fluid" alt="Photo"> <br>
                                @else
                                    <img src="{{ URL('images/' . $Recepie[$num]['image']) }}" class="img-fluid"
                                        alt="Photo"> <br>
                                @endif
                            </div>

                            <?php
                            echo substr($Recepie[$num]['body'], 0, 100);
                            ?>

                            <div class="w-100 borderBottom-color-yellow">
                                <i class="bi bi-piggy-bank">b</i> {{ $Recepie[$num]['price'] }}
                                <i class="bi bi-stopwatch">s</i> {{ $Recepie[$num]['speed'] }}
                                <i class="bi bi-egg-fried">e</i> {{ $Recepie[$num]['taste'] }}
                            </div>
                        </a>
                    </div>
                @else
                    <div class="col-md-3 d-flex justify-content-center m-1 border">
                        <a href="{{ route('subCreateForm', ['slug' => $Recepie[0]['primary']]) }}" class="my-auto">
                            <button class="btn bg-own-green m-1 px-3">
                                +
                            </button>
                        </a>
                    </div>
                @endif
            @endfor
        </div>
    @endfor

@endsection
