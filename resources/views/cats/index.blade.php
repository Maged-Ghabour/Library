@extends("layout")



@section("title")
@lang("site.cat")
@endsection

@section("content")



<div class="container">

    <h1 class="text-center text-secondary my-4">@lang("site.cat")</h1>







    @if($cats->isEmpty())
        <div class="alert alert-warning text-center">
            <h3 class="my-5">No Categories Yet...! </h3>
            <i class="fa-solid fa-cart-arrow-down fa-10x"></i>

        </div>
    @endif


@if($cats->isNotEmpty())


<table class="table table-bordered w-50 mx-auto my-3 table-responsive">
   <thead class="text-center">
    <th style="width: 60%">@lang("site.catName")</th>
    <th style="width:40%">@lang("site.actions")</th>
   </thead>

   <tbody>

<div class="row row-cols-1 row-cols-md-5 g-4">

@endif
    @foreach ($cats as $cat )
    <tr>
        <td>{{$cat->name}}</td>
        <td>
            <a class="btn btn-warning btn-sm" href="{{route('cats.show',$cat->id)}}"><i class="fa-solid fa-eye"></i> @lang("site.show")</a>
            <a class="btn btn-primary btn-sm" href="{{route('cats.edit',$cat->id)}}"><i class="fa-regular fa-pen-to-square"></i>  @lang("site.edit")</a>
            <a class="btn btn-danger btn-sm" href="{{route('cats.del',$cat->id)}}"><i class="fa-solid fa-trash-can"></i>  @lang("site.delete")</a>
        </td>
    </tr>
    @endforeach

        </div>
        </tbody>
    </table>






</div>





@endsection



