@extends('layouts.app')
@section('content')

<script>
    const button = document.getElementById("count");
    const wynik = document.getElementById("wynik");

    var ocena =new Array() ;
    var count=0;
    var i=0;
    var ocenione = true;

    function HandleStarOver(num)
    {
        if(ocenione)
        {
            for(let i=0;i<=num;i++)
            {
                document.getElementById(i).src = "{{URL('images/star.svg')}}";
            }
        }
    }

    function HandleStarOut(num)
    {
        if(ocenione)
        {
            for(let i=0;i<=num;i++)
            {
                document.getElementById(i).src = "{{URL('images/Star-Filed.svg')}}";
            }
        }
    }

    function HandleStarCount(num)
    {
        if(!ocenione)
        {
            ocena[count] = num;
            for(let i=0;i<num;i++)
            {
                document.getElementById(i).src = "{{URL('images/Star-Filed.svg')}}";
            }
            document.getElementById("price").value = ocena[count];
            count++;
            console.table(ocena);
        }
        ocenione=true;
    }

    function reset()
    {
        if(!ocenione)
        {
            // ocenione=true;
            for(let i=0;i<=4;i++)
            {
                document.getElementById(i).src = "{{URL('images/star.svg')}}";
            }
        }
    }
</script>


<?php 
$Recepie = $editedRecepie;
?>

    <div class=" row d-flex text-center m-2  ">
        <div class=" float-start w-75">
            <h1>{{ $RecepieMain['title'] }}</h1> 
            <a href="/Recepies/edited/list/{{$RecepieMain['id']}}" class="linkFont">
                <button class="btn border bg-own-yellow "> 
                    przeglądaj inne wersje 
                </button>
            </a>
            <a href="/create/edit/{{$Recepie['id']}}" class="linkFont">
                <button class="btn border bg-own-yellow "> 
                    edytuj
                </button>
            </a>
        </div>
        
        <div class="w-25" >
            <form action="/Recepies/Wiew/AddEditedOpinion/{{ $RecepieMain['id'] }}" 
                  method="POST"
            >
            @method('put')
            @csrf
            <input type="text" name="id" value="{{ $Recepie['id'] }}" hidden>
            <input type="number" hidden name="price" id="price">
            <input type="number" hidden name="speed" id="speed">
            <input type="number" hidden name="taste" id="taste">

                <div class="w-50 text-center d-flex justify-content-center" onload="star()" onmouseout="reset()">
                    <i class="bi bi-piggy-bank"></i> 
                        <img id="0" class="image-flex w-100 float-left" src="{{URL('images/star.svg')}}" onmouseover="HandleStarOver(0)" onmouseout="HandleStarOut(0)" onclick="HandleStarCount(1)">
                        <img id="1" class="image-flex w-100 float-left" src="{{URL('images/star.svg')}}" onmouseover="HandleStarOver(1)" onmouseout="HandleStarOut(1)" onclick="HandleStarCount(2)">
                        <img id="2" class="image-flex w-100 float-left" src="{{URL('images/star.svg')}}" onmouseover="HandleStarOver(2)" onmouseout="HandleStarOut(2)" onclick="HandleStarCount(3)">
                        <img id="3" class="image-flex w-100 float-left" src="{{URL('images/star.svg')}}" onmouseover="HandleStarOver(3)" onmouseout="HandleStarOut(3)" onclick="HandleStarCount(4)">
                        <img id="4" class="image-flex w-100 float-left" src="{{URL('images/star.svg')}}" onmouseover="HandleStarOver(4)" onmouseout="HandleStarOut(4)" onclick="HandleStarCount(5)">
                </div>

                <div class="w-50 text-center d-flex justify-content-center" onload="star()">
                    <i class="bi bi-stopwatch"></i>
                        <img id="0" class="image-flex w-100 float-left" src="{{URL('images/star.svg')}}" onmouseover="HandleStarOver(0)" onmouseout="HandleStarOut(0)" onclick="HandleStarCount(1)">
                        <img id="1" class="image-flex w-100 float-left" src="{{URL('images/star.svg')}}" onmouseover="HandleStarOver(1)" onmouseout="HandleStarOut(1)" onclick="HandleStarCount(2)">
                        <img id="2" class="image-flex w-100 float-left" src="{{URL('images/star.svg')}}" onmouseover="HandleStarOver(2)" onmouseout="HandleStarOut(2)" onclick="HandleStarCount(3)">
                        <img id="3" class="image-flex w-100 float-left" src="{{URL('images/star.svg')}}" onmouseover="HandleStarOver(3)" onmouseout="HandleStarOut(3)" onclick="HandleStarCount(4)">
                        <img id="4" class="image-flex w-100 float-left" src="{{URL('images/star.svg')}}" onmouseover="HandleStarOver(4)" onmouseout="HandleStarOut(4)" onclick="HandleStarCount(5)">
                </div>

                <div class="w-50 text-center d-flex justify-content-center" onload="star()">
                    <i class="bi bi-egg-fried"></i> 
                        <img id="0" class="image-flex w-100 float-left" src="{{URL('images/star.svg')}}" onmouseover="HandleStarOver(0)" onmouseout="HandleStarOut(0)" onclick="HandleStarCount(1)">
                        <img id="1" class="image-flex w-100 float-left" src="{{URL('images/star.svg')}}" onmouseover="HandleStarOver(1)" onmouseout="HandleStarOut(1)" onclick="HandleStarCount(2)">
                        <img id="2" class="image-flex w-100 float-left" src="{{URL('images/star.svg')}}" onmouseover="HandleStarOver(2)" onmouseout="HandleStarOut(2)" onclick="HandleStarCount(3)">
                        <img id="3" class="image-flex w-100 float-left" src="{{URL('images/star.svg')}}" onmouseover="HandleStarOver(3)" onmouseout="HandleStarOut(3)" onclick="HandleStarCount(4)">
                        <img id="4" class="image-flex w-100 float-left" src="{{URL('images/star.svg')}}" onmouseover="HandleStarOver(4)" onmouseout="HandleStarOut(4)" onclick="HandleStarCount(5)">
                </div>

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
                    $ingredient = explode(',', $Recepie["ingredients"] ) ;
                    $lenght = count( $ingredient );
                ?>
                @for($i=0; $i < $lenght-1; $i++)
                    <li> {{ $ingredient[$i] }} </li><br>
                @endfor
            </ul>
        </div>
        <div class="col-md-3  p-2 border-top border-3 ">
            Edytowane przez: <br>
            <b> {{ $owner['name'] }} </b>
        </div>

        <div class="col-md-2 my-1">
            @if($Recepie['photo'] == "none")
                 <img src="{{URL('images/Test_icon.png')}}" class="img-fluid" alt="Photo"> <br>
            @else
                <img src="{{URL('images/'.$Recepie['photo']) }}" alt="IMG" class="img-fluid "
                    style="max-height: 300px">
            @endif
            
        </div>

        <div class="col-md-6 p-2 m-1">
            {{$Recepie['body']}}
            Lorem ipsum dolor,sit amet consectetur adipisicing elit. Necessitatibus, exercitationem! Pariatur, minima? Natus itaque facilis quisquam ipsum officia maiores quas voluptatibus qui quis. Sequi tempora corporis provident reprehenderit voluptates. Facere fugiat esse dolorem consequuntur doloribus quod ducimus obcaecati quis aut libero. Ducimus molestiae quasi dignissimos ad officia explicabo quae, asperiores ipsam et magni quia aliquam exercitationem rem dolorum nemo aperiam!
        </div>
    </div>
    {{--  coment --}}
    <div class="row m-3 p-2 border-top justify-content-center">

        <div class="col-md-4 border p-2">
            <form action={{ url('/Recepies/addComent/'.$Recepie['id']) }} method="post">
            @csrf
                <img src="{{URL('images/honeycomb.ico')}}" width="6%" class=" border rounded-circle m-1" >
                {{ $userName }} : 
                <textarea name="comment" id="comment"class="form-control" rows="2"> </textarea>
                <div  class="my-1">
                    <button type="submit" class="btn btn-success float-end m-1" >
                        skomętuj
                    </button>
                </div>
            </form>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <br> {{ $error }}
                @endforeach
            @endif
        </div>

    </div>

    {{$i=0}}
    @foreach ($coments as $coment)
        @if ( $i ==10 || $coment_user[0]=="empty")
            @break
        @endif
        <div class="row m-2 p-2 justify-content-center ">
            <div class="col-md-4 mx-auto border p-2">
                <small class="float-end"> {{$coment['created_at']}} </small> <br>
                <img src="{{URL('images/honeycomb.ico')}}" width="6%" class=" border rounded-circle" >
               <b> {{ $coment_user[$i]['name'] }} : </b> 
                <div class="border my-2">
                    {{$coment['comment']}}
                </div>
            </div>
        </div>
    {{$i++}}
    @endforeach
@endsection