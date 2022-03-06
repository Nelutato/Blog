@include('layouts/navbar')



<div class="container d-flex justify-content-center">
    <form action="/createPost" method="POST" enctype="multipart/form-data">
    @csrf
        Title: <br>
            <input type="text" name="title" id=""> <br>
        Img: <br>
            <input type="file" name="image" class="from-control"> <br>
        ingredients: <br>
            <input type="text" name="ingredients" id=""> <br>
        body: <br>
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