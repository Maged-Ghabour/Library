<div class="container mt-5">
@include("inc.errors")
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
        @lang("site.addNote")
    </button>

    <form  method="POST" action="{{route('notes.store')}}">
        @csrf

         <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

        <div class="modal-body">

        <div class="mb-3">
            <input class="form-control" type="text" name="content" placeholder=@lang('site.content') value="{{old('content')}}">
        </div>
        <div class="modal-footer">
            <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">@lang("site.close")</button>
            <button  class="btn btn-primary">@lang("site.saveChanges")</button>
          </div>

        </div>
    </div>
  </div>
</div>
    </form>
</div>
