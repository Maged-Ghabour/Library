@extends("layout")

@section("title")
Edit- {{$cat->id}}
@endsection

@section("content")

<div class="container mt-5">
@include("inc.errors")
    <form  method="POST" action="{{route('cats.update',$cat->id)}}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <input class="form-control" type="text" name="name" placeholder="Category Name" value="{{old("name" ) ?? $cat->name}}">
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">Edit</button>
        </div>
    </form>
</div>

@endsection
