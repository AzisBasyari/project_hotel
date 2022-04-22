<nav class="navbar navbar-expand-lg navbar-dark bg-secondary no-print">
    <div class="container">
      <a class="navbar-brand" href="{{ route('index') }}">
        <img src="{{ asset('img/logo.png') }}" alt="" style="width: 30px">
        MYHotel
        @if (auth()->user())
          | {{ auth()->user()->role}}
        @endif
      </a>
      <div class="d-flex justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
        @if (url()->current() == route('login.index'))
        <li class="nav-item">
          <a class="nav-link {{ url()->current() === route('index') ? 'active' : ''}}" aria-current="page" href="{{ route('index') }}">Home</a>
        </li>
        @elseif (auth()->user())
          <li class="nav-item">
            <form action="/logout" method="post">
              @csrf
              <button type="submit" class="btn btn-light text-dark rounded-pill px-3 py-1">Logout</button>
          </form>
          </li>
        @else
        <li class="nav-item">
          <a class="nav-link {{ url()->current() === route('index') ? 'active' : ''}}" aria-current="page" href="{{ route('index') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ url()->current() === route('kamar') ? 'active' : ''}}" href="{{ route('kamar') }}">Kamar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ url()->current() === route('fasilitas') ? 'active' : ''}}" href="{{ route('fasilitas') }}">Fasilitas Hotel</a>
        </li>
        <li class="nav-item ms-3">
          <a class="nav-link btn btn-light text-dark rounded-pill px-3 py-1 mt-1" href="{{ route('reservasi.index') }}">Reservasi</a>
        </li>
        @endif
        </ul>
      </div>
    </div>
  </nav>