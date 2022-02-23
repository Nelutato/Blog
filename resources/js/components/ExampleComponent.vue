<template>
    <div class="col-md-5 p-1 bg-light text-md-start">
        <carousel :items="1">
            <h1 class="d-inline bg-light m-1">
                {{ $recepie['title'] }}
            </h1>
            <small class="float-end"> {{$recepie['created_at']}} </small> <br>
            {{$recepieBody}} <br>

            <b id="ingredients"> Składniki : </b> <br>
                <ul class=" bg-light">
                @for($i=0; $i < $lenght; $i++)
                    @if ($i==2) 
                    @break @endif
                    <li> {{ $ingredient[$i] }} </li>
                @endfor
                <a href="/Recepies/Wiew/ {{ $recepie['id'] }}" class=" bg-light">
                    <button type="button" class="btn bg-own-green float-end">
                    Więcej ...
                    </button>
                </a>
                </ul>
            </div>

            <div class="col-md-3 text-center bg-light">
            <img src="{{ asset('images/'. $recepie['image']) }}" 
                alt="IMG" class="img-fluid " 
                style="height: 300px ;width: 350px"
                >
            </div> 
        </carousel>
</template>

<script>
    import carousel from 'vue-owl-carousel';

    export default {
        components: { carousel },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
