@extends("layout")



@section("title")
@lang("site.allBooks")
@endsection

@section("style")
<style>

    .pagination > li > a:focus,
    .pagination > li > a:hover,
    .pagination > li > span:focus,
    .pagination > li > span:hover {
    z-index: 3;
    color: #b46206;
    background-color: rgb(220, 243, 92);
    border-color: #ddd;
}
.fa-cart-shopping {
    color: rgb(140, 145, 225);
}

</style>
@endsection

@section("content")




<div class="container">

    <input  class="mt-3" type="text" id="key">


    <h1 class="text-center text-secondary my-4">@lang("site.allBooks")</h1>

    @if ($books->isEmpty())
    <div class="alert alert-warning m-auto text-center">
        <img class="img-fluid" src="{{asset('imgs/no-products-found.png')}}" alt="">
    </div>

    @endif

<div class="row row-cols-1 row-cols-md-5 g-2">


    @foreach ($books as $book )


    <div class="col">
        <div class="card h-100">

          <img src="{{asset("uploads/" . $book->img)}}" class="card-img-top p-2" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$book->title}}</h5>
            <p class="card-text">{{$book->desc}}</p>

                <a class="btn btn-secondary btn-sm" href="{{route('books.show',$book->id)}}"><i class="fa-solid fa-eye"></i> @lang("site.show")</a>


                @auth
                @if (Auth::user()->is_admin == 1)
                <a class="btn btn-primary btn-sm" href="{{route('books.edit',$book->id)}}"><i class="fa-regular fa-pen-to-square"></i> @lang("site.edit")</a>
                <a class="btn btn-danger btn-sm" href="{{route('books.del',$book->id)}}"><i class="fa-solid fa-trash-can"></i> @lang("site.delete")</a>
                @endif

                @endauth

                @auth
                <a class="btn btn-warning btn w-100 my-2" href="#"> <i class="fa-solid fa-cart-shopping white"></i>@lang("site.addToCard")</a>
                @endauth


          </div>
        </div>
      </div>



    @endforeach
</div>




    {{-- <div class="mt-3"> {{$books->links()}}</div> --}}

   </div>

@endsection

@section("scripts")

<script>
    const key = document.getElementById("key");

    key.addEventListener("keyup",()=>{
       const keyword = key.value
        const url = '{{route("books.search")}}'+'?keyword='+ keyword

        var XHR = new XMLHttpRequest();
         XHR.open("get" , url, true)

         XHR.onReadyStateChange = function(data){

                console.log(data);

         }

         XHR.send();
    })



</script>

@endsection



