@extends("layout")
@section("title")
My Notes
@endsection


@section('style')


@section("content")

<div class="container mt-5">
    @include("notes.create")



<div class="row row-cols-1 row-cols-md-3 g-4">

    @if (Auth::user()->notes->isEmpty())

<div class="alert alert-warning m-auto text-center">No Notes Yet</div>
@endif

@foreach (Auth::user()->notes as $note )
<div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"> {{$note->content}}</h5>
        <p class="card-text text-muted">{{$note->created_at}}</p>
        <a href="{{route('notes.delete' , $note->id)}}" class="btn btn-danger"> <i class="fa-solid fa-trash-can"></i> @lang("site.delete")</a>
      </div>
    </div>
  </div>
@endforeach

</div>
<a class="btn btn-danger mt-2" href="{{route('books.index')}}">@lang("site.back")</a>
</div>
@endsection


