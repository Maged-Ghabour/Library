@extends("layout")
@section("title")
@lang("site.login")
@endsection
@section("content")


<div class="container mt-5">

    <form method="POST" action="{{route('auth.handleLogin')}}" class="p-5">
        @include("inc.errors")
        @csrf

       <!-- Email input -->
       <div class="form-outline mb-4  w-50">
         <input type="email" id="form2Example1" class="form-control" name="email" value="{{old('email')}}" />
         <label class="form-label" for="form2Example1">Email address</label>
       </div>

       <!-- Password input -->
       <div class="form-outline mb-4  w-50">
         <input type="password" id="form2Example2" class="form-control" name="password" value="{{old('password')}}"/>
         <label class="form-label" for="form2Example2">Password</label>
       </div>


       <!-- Submit button -->
       <button  class="btn btn-primary btn-block mb-4">@lang("site.login")</button>

       {{-- <a href="{{route('auth.github.redirect')}}" class="btn btn-primary mb-4">Sign with github</a> --}}


       </div>
     </form>
</div>
@endsection
