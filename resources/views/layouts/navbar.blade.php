<nav class="navbar navbar-expand-lg navbar-dark bg-primary no-print">
    <div class="container">
      <a class="navbar-brand" href="#">My Hotel</a>
      <div class="d-flex justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ url()->current() === route('index') ? 'active' : ''}}" aria-current="page" href="{{ route('index') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ url()->current() === '/kamar' ? 'active' : ''}}" href="#">Kamar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ url()->current() === '/fasilitas' ? 'active' : ''}}" href="#">Fasilitas Hotel</a>
          </li>
          <li class="nav-item ms-3">
            <a class="nav-link btn btn-light text-dark rounded-pill px-3 py-1 mt-1" href="{{ route('reservasi.index') }}">Reservasi</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>