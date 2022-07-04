@extends('layouts.master')
@section('css')

@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> ncvlxcnvxcnvxcv</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">



<div class="container">

    <h1 class="text-center text-secondary my-4">All Books</h1>

    @if ($books->isEmpty())
    <div class="alert alert-warning m-auto text-center">
        <img class="img-fluid" src="{{asset('imgs/no-products-found.png')}}" alt="">
    </div>

    @endif

<div class="row row-cols-1 row-cols-md-5 g-2">


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>title</th>
                <th>description</th>
                <th>img</th>
                <th>actions</th>
            </tr>
        </thead>
    @foreach ($books as $book )

        <tbody>
            <tr>
                <td>{{$book->title}}</td>
                <td>{{$book->desc}}</td>
                <td>
                    <img src="{{asset("uploads/" . $book->img)}}" class="card-img-top p-2" style="width:20%;height:20%"   alt="...">
                </td>
                <td>
                    <a class="btn btn-secondary btn" href="{{route('books.show',$book->id)}}"><i class="fa-solid fa-eye"></i> Show</a>
                    <a class="btn btn-primary btn" href="{{route('books.edit',$book->id)}}"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
                    <a class="btn btn-danger btn" href="{{route('books.del',$book->id)}}"><i class="fa-solid fa-trash-can"></i> Delete</a>
                </td>
            </tr>





    @endforeach
</tbody>
</table>
</div>




    <div class="mt-3"> {{$books->links()}}</div>

   </div>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
