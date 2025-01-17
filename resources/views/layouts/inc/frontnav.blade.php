<nav class="navbar navbar-expand-lg bg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">TOKOKU</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('category') }}">Category</a>
          </li>
          
          
          @guest
          @if (Route::has('login'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @endif
          
          @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
              @endif
              @else
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="#">
                      Profile
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ url('my-order') }}">
                      Order
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ route('logout') }} "  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                  </li>
                  
                </ul>
              </li>
              
              @endguest
              
        
        
              
              
              <li class="nav-item">
                <a class="nav-link" href="{{ url('cart') }}"><i class="fa-solid fa-cart-shopping"></i>
                  <span class="badge rounded-pill  bgnav cart-count ">0</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('wishlist') }}"><i class="fa fa-heart-o" aria-hidden="true"></i>
                  <span class="badge rounded-pill bgnav wishlist-count">0</span>
                </a>
              </li>

            </ul>
          </div>
        </div>
      </nav>