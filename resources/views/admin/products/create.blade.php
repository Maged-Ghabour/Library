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
                <div class="container mt-5">

                    @include("inc.errors")
                        <form  method="POST" action="{{route('books.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <input class="form-control" type="text" name="title" placeholder="Title" value="{{old('title')}}">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="text" name="desc" placeholder="Description" value="{{old('desc')}}">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="file" name="img" placeholder="Image">
                            </div>

                            <div class="mb-3">
                                <h5>Choose Category </h5>

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
                                <button class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
