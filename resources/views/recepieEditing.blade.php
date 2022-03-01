@include('layouts/navbar')

<div class="row d-flex justify-content-center">
    <div class="col-md-8 text-center">
        <form action={{ url('/edit/createRecepie/'.$id)}} method="POST" enctype="multipart/form-data">
            @csrf
                <b> Title : </b><br>
                    <input type="text" name="title" id=""> <br>
                <b> Img : </b><br>
                    <input type="file" name="image" class="from-control"> <br>
                <b> ingredients : </b> <br>
                    <input type="text" name="ingredients" id=""> <br>
                <b> body : </b> <br>
                    <textarea name="body" id="body"
                     cols="30" rows="10"> 
                    </textarea><br>
                <button type="submit" class="btn btn-primary m-1"> post </button>
                
                @if ($errors->any())
                    <div class="bg-dark m-1 p-1 text-own-yellow">
                        @foreach ($errors->all() as $err)    
                            {{$err}} <br>  
                        @endforeach
                    </div>
                @endif
            </form>
    </div>
</div>

@include('layouts/fotter')