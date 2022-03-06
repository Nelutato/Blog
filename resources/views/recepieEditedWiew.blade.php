@include('layouts/navbar')

<div class="row text-center borderBottom-color-yellow">
    <h1>{{$RecepieMain['title']}}</h1>
</div>
@for($i= 0; $i< 9; $i= $i+3)

<div class="row d-flex justify-content-center m-1"> 
    @for ($j = 0; $j < 3; $j++)
        <?php $num = $j +$i ?>

        @if(isset($Recepies[$num]))
            <?php
                $body= substr($Recepies[$num]['Body'],0,100);
            ?>
            
            <div class="col-md-3 border m-1 d-inline" id="editedRecepieBlock">
                <a href="/Recepies/edited/ShowFullEdited/{{$Recepies[$num]['id']}}" class="linkFont-Black">
                    <div class="w-75 float-start borderBottom-color-yellow "> 
                        Ingridients : <br>
                        {{$Recepies[$num]['ingredients']}} 
                    </div>
                    <div class="w-25 float-end">
                        @if($Recepies[$num]['photo'] == "none")
                            <img src="{{URL('images/Test_icon.png')}}" class="img-fluid" alt="Photo"> <br>
                        @else
                            <img src="{{URL('images/'.$Recepies[$num]['photo'])}}" class="img-fluid" alt="Photo"> <br>
                        @endif
                    </div>
                    <div class="w-100 borderBottom-color-yellow">
                        {{$body }}
                    </div>
                    <div class="w-100 borderBottom-color-yellow">
                        <i class="bi bi-piggy-bank"></i> {{ $Recepies[$num]['price'] }} <br>
                        <i class="bi bi-stopwatch"></i> {{ $Recepies[$num]['speed'] }}<br>
                        <i class="bi bi-egg-fried"></i> {{ $Recepies[$num]['taste'] }} <br>
                    </div>
                    <div class="w-100 ">
                        <small> Stwożony przez : </small>
                        {{$owner['name']}}
                    </div>
                </a>
            </div>
            
        @else
            <div class="col-md-3 d-flex justify-content-center m-1 border">
                    <a href="/Recepies/Wiew/edit/{{ $RecepieMain['id'] }}" class="my-auto">
                        <button class="btn bg-own-green m-1 px-3">
                            +
                        </button>
                    </a>
            </div>      
        @endif
    @endfor
</div>
@endfor

@include('layouts/fotter')