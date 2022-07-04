@extends("layout")

@section("title")
@lang("site.edit") - {{$book->id}}
@endsection

@section("content")

<div class="container mt-5">
@include("inc.errors")
    <form  method="POST" action="{{route('books.update',$book->id)}}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <input class="form-control" type="text" name="title" placeholder="Title" value="{{old("title" ) ?? $book->title}}">
        </div>
        <div class="mb-3">
            <input class="form-control" type="text" name="desc" placeholder="Description" value="{{old("desc") ?? $book->desc}}">
        </div>
        <div class="mb-3">
            <input class="form-control" type="file" name="img" placeholder="Image">
        </div>

        <div class="mb-3">
            <img src="{{asset('uploads/'.$book->img)}}" class="img-thumbnail" style="width: 150px;height:150" alt="...">
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">@lang("site.edit")</button>
        </div>
    </form>
</div>

@endsection
