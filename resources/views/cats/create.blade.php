@extends("layout")

@section("title")
Add Book
@endsection

@section("content")

<div class="container mt-5">

@include("inc.errors")
    <form  method="POST" action="{{route('cats.store')}}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <input class="form-control" type="text" name="name" placeholder="@lang('site.catName')" value="{{old('name')}}">
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">@lang("site.add")</button>
        </div>
    </form>
</div>
@endsection
