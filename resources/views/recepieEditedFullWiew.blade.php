@include('layouts/navbar')
<?php 
$Recepie = $editedRecepie;
?>

    <div class=" row d-flex text-center m-2  ">
        <div class=" float-start w-75">
            <h1>{{ $RecepieMain['title'] }}</h1> 
            <a href="/Recepies/edited/list/{{$Recepie['id']}}" class="linkFont">
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
        
        <div class="w-25">
            <form action="/Recepies/Wiew/AddEditedOpinion/{{ $RecepieMain['id'] }}" 
                  method="POST"
            >
            @method('put')
            @csrf
            <input type="text" name="id" value="{{ $Recepie['id'] }}" hidden>
                <i class="bi bi-piggy-bank"></i> 
                    <select name="price" id="price">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select> <br>
                <i class="bi bi-stopwatch"></i>
                    <select name="speed" id="speed">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select> <br> 
                <i class="bi bi-egg-fried"></i>
                    <select name="taste" id="taste">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
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