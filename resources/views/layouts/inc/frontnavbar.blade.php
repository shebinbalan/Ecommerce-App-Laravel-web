<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{url('/')}}">E-Shop</a>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<div class="search-bar">
  <form action="{{url('searchproduct')}}" method="POST">
    @csrf
<div class="input-group">  
  <input type="search" class="form-control" id="search_product" name="product_name" required placeholder="Search Products"  aria-describedby="basic-addon1">
  <button type="submit"  class="input-group-text"><i class="fa fa-search"></i></button>
</div>
</form>
</div>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('category')}}">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('cart')}}">Cart</a>
          <span class="badge badge-pill bg-primary cart-count">0</span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('wishlist')}}">Wishlist</a>
          <span class="badge badge-pill bg-success wishlist-count">0</span>
        </li>
        
        <!-- <li class="nav-item">
          <a class="nav-link" href="{{url('my-orders')}}">My Orders</a>
        </li> -->
       
      
     
                    <!-- Left Side Of Navbar -->
                                      <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href=""
                                       onclick="event.preventDefault();
                                                     document.getElementById('').submit();">
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="my-orders"
                                     
                                                   >
                                        {{ __('My Orders') }}
                                    </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
             
    </div>
    
  </div>
    
</nav>