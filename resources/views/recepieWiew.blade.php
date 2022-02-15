@include('layouts/navbar')
<div class="container-flex" >

    <div class="row  m-2 text-center">
            <h2>{{$Recepie['title']}}</h2> <br>
    </div>

    <div class="row mx-auto  my-2 justify-content-center">

        <div class="col-md-3  p-2 border-top border-3">
            <p> składniki : <br></p>
            <ul>
                <?php
                    $ingredient = explode(',', $Recepie["ingredients"] ) ;
                    $lenght = count( $ingredient );
                ?>
                @for($i=0; $i < $lenght; $i++)
                    <li> {{ $ingredient[$i] }} </li><br>
                @endfor
            </ul>
        </div>
        <div class="col-md-3  p-2 border-top border-3 ">
            stwożone przez: <br>
            <b> {{ $creatorName }} </b>
        </div>

        <div class="col-md-2 my-1">
            <img src="{{URL('images/'.$Recepie['image']) }}" alt="IMG" class="img-fluid "
            style="max-height: 300px">
        </div>

        <div class="col-md-6 p-2 m-1">
            {{$Recepie['body']}}
            Lorem ipsum dolor,sit amet consectetur adipisicing elit. Necessitatibus, exercitationem! Pariatur, minima? Natus itaque facilis quisquam ipsum officia maiores quas voluptatibus qui quis. Sequi tempora corporis provident reprehenderit voluptates. Facere fugiat esse dolorem consequuntur doloribus quod ducimus obcaecati quis aut libero. Ducimus molestiae quasi dignissimos ad officia explicabo quae, asperiores ipsam et magni quia aliquam exercitationem rem dolorum nemo aperiam!
        </div>
    </div>

    {{--  coment Section  --}}

    <div class="row m-3 p-2 border-top justify-content-center">

        <div class="col-md-4 border p-2">

            <form action="/Recepies/addComent" method="post">
                @csrf
                <label for="comment" class="d-flex  my-1"> 
                    <img src="{{URL('images/honeycomb.ico')}}" 
                        width="6%" class=" border rounded-circle" >
                    {{ $userName }} : 
                </label>

                <textarea name="comment" id="comment"
                        class="form-control" rows="2">
                </textarea>

                <i class="bi bi-star my-1"></i>
                <i class="bi bi-star"></i>
                <i class="bi bi-star"></i>   
                <button class="btn btn-success float-end m-1" 
                        type="submit">
                        Button
                </button>
            </form>
            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <br> {{ $error }}
            @endforeach
        @endif
        </div>

    </div>
    
</div>
{{-- {{$coments}} --}}