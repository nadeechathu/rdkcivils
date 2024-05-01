<nav class="navbar navbar-expand-md bg-body-tertiary">
  <div class="container-xl">
    <a class="navbar-brand" href="{{route('web.home')}}">
      <img src="{{ asset($commonContent['siteLogo']['description']) }}" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
            @include('client_portal.testimonials.components.add_testimonial')
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('web.home')}}">Home</a>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Account
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('clients.user.profile')}}">Profile</a></li>
            <li><a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>

          </ul>
        </li>


      </ul>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
      <div class="contact-info d-md-flex mb-3">
        <p>020 3370 2117 | 079 85543471</p>
        <p><a href="mailto:info@rdkcivils.co.uk">info@rdkcivils.co.uk</a></p>
      </div>
    </div>
  </div>
</nav>
