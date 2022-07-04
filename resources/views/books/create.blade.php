@extends("layout")

@section("title")
@lang("site.addBook")
@endsection

@section("content")


<div class="container mt-5">

@include("inc.errors")
    <form  method="POST" action="{{route('books.store')}}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <input class="form-control" type="text" name="title" placeholder="@lang('site.titleOfBook')" value="{{old('title')}}">
        </div>
        <div class="mb-3">
            <input class="form-control" type="text" name="desc" placeholder="@lang('site.DescOfBook')" value="{{old('desc')}}">
        </div>
        <div class="mb-3">
            <input class="form-control" type="file" name="img" >
        </div>

        <div class="mb-3">
            <h5>@lang("site.ChooseCat")</h5>

            @foreach ($cats as $cat)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="cat_ids[]" value="{{$cat->id}}" id="{{$cat->id}}">
                <label class="form-check-label" for="{{$cat->id}}">
                    {{$cat->name}}
                </label>
            </div>
            @endforeach


        </div>

        <div class="mb-3">
            <button class="btn btn-primary">@lang("site.add")</button>
        </div>
    </form>
</div>
@endsection
</div>
</div>
</div>


