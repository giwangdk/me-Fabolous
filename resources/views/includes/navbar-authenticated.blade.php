<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top " 
          data-aos="fade-down">
      <div class="container">
        <a href="/index.html" class="navbar-brand">
          <img src="images/logo.svg" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a href="/index.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item ">
              <a href="/categories.html" class="nav-link">Categories</a>
            </li>
            <li class="nav-item ">
              <a href="#" class="nav-link">Rewards</a>
            </li>
            <!--Dekstop Menu-->
            
          </ul>
          <ul class="navbar-nav d-none d-lg-flex">
              <li class="nav-item dropdown">
                <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                  <img src="images/icon-user.png" class="rounded-circle mr-2 profile-picture" alt="">
                  Hi, Giwang
                </a>
                <div class="dropdown-menu">
                  <a href="/dashboard.html" class="dropdown-item">Dashboard</a>
                  <a href="/dashboard-account.html" class="dropdown-item">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a href="/" class="dropdown-item">Logout</a>
                </div>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link d-inline-block mt-2">
                  <img src="images/icon-cart-empty.svg" alt="">
                </a>
              </li>
            </ul>
            <ul class="navbar-nav d-block d-lg-none">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  Hi, Giwang
                </a>
              </li>
               <li class="nav-item">
                <a href="#" class="nav-link d-inline-block">
                  Cart
                </a>
              </li>
            </ul>
        </div>
      </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-book fixed-top">
        <a class="navbar-brand" href="#">Me. <span>Fabulous</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav m-auto">
            <li class="nav-item active">
            <a class="nav-link" href="{{route('home')}}">home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('categories')}}">book MUA</a>
                </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Tentang</a>
            </li>
           
        </ul>
        <ul class="navbar-nav nav-button ">
          
            <li class="nav-item dropdown">
                <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                  <img src="images/icon-user.png" class="rounded-circle mr-2 profile-picture" alt="">
                  Hi, Giwang
                </a>
                <div class="dropdown-menu">
                  <a href="/dashboard.html" class="dropdown-item">Dashboard</a>
                  <a href="/dashboard-account.html" class="dropdown-item">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a href="/" class="dropdown-item">Logout</a>
                </div>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link d-inline-block mt-2">
                  <img src="images/icon-cart-empty.svg" alt="">
                </a>
              </li>
            </ul>
            <ul class="navbar-nav d-block d-lg-none">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  Hi, Giwang
                </a>
              </li>
               <li class="nav-item">
                <a href="#" class="nav-link d-inline-block">
                  Cart
                </a>
              </li>
            </ul>
        </ul>
        </div>
    </nav>