@extends("layout")

@section("title")
Book {{$book->id}}
@endsection
@section("content")

<div class="container mt-5 bg ">
    <div class="shadow p-3 mb-5 bg-body rounded">
        <h3>{{$book->id}}</h3>
        <h3>{{$book->title}}</h3>
        <h6>Categories :-</h6>
        @foreach ($book->cats as $cat)
            <div class="badge bg-light text-muted  my-2">{{$cat->name}}</div>
        @endforeach
        <a  class="btn btn-danger d-block mt-3" style="width: 10%" href="{{ route('books.index')}}">@lang("site.back")</a>
    </div>
</div>





@endsection
