@extends("layout")

@section("title")
Category {{$cat->id}}
@endsection
@section("content")

<div class="container mt-5 bg ">
    <div class="shadow p-3 mb-5 bg-body rounded">
        <h3>{{$cat->id}}</h3>
        <h3>{{$cat->name}}</h3>
        <a  class="btn btn-danger" href="{{ route('cats.index')}}">Back</a>
    </div>
</div>





@endsection
