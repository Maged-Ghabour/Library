<div>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="ms-5 nav-link" aria-current="page"  href="{{route('books.index')}}">@lang("site.home")</a>
              </li>
            @auth
              @if (Auth::user()->is_admin==1)
              <li class="nav-item mx-3">
                <a class="nav-link" href="{{route('books.create')}}">@lang("site.addBook")</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="{{route('cats.index')}}"> @lang("site.cat")</a>
              </li>
              <li class="nav-item mx-3">
                <a class="nav-link" href="{{route('cats.create')}}"> @lang("site.addCat")</a>
              </li>
              @endif
              <li class="nav-item">
                <a class="nav-link" href="{{route('notes.index')}}">@lang("site.notes")</a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  @lang("site.allCats")
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach ($cats as $cat )
                    <li><a class="dropdown-item" href="{{route('cats.show',$cat->id)}}">{{$cat->name}}</a></li>
                    @endforeach

                </ul>


              @endauth
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth
                <li class="nav-item">
                    <a  class="nav-link disabled text-white" > {{Auth::user()->email}} </a>
                </li>
                @endauth
                @guest
                <li class="nav-item">
                    <a  class="nav-link btn btn-secondary text-white" href="{{route('auth.register')}}">
                        <i class="fa-solid fa-user-large"></i> @lang("site.register") </a>
                  </li>

                  <li class="nav-item mx-2 ">
                    <a  class="nav-link btn btn-primary text-white" href="{{route('auth.login')}}">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i> @lang("site.login") </a>
                  </li>

                @endguest
              @auth
              <li class="nav-item ">

                <a  class="nav-link btn btn-danger text-white" href="{{route('auth.logout')}}">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    @lang("site.logout") </a>
              </li>
              @endauth

            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white ms-5" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               @lang("site.lang")
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                  <li><a class="dropdown-item" href="{{route('lang.en')}}">English</a>
                  <li><a class="dropdown-item" href="{{route('lang.ar')}}">عربي</a>

                  </li>


              </ul>
            </li>
            </ul>

          </div>
        </div>
      </nav>

</div>
