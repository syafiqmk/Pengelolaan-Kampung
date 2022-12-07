<div class="d-flex flex-column flex-shrink-0 min-vh-100 p-3 text-bg-dark sticky-top" style="width: 100%;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <span class="fs-4">Pengelolaan<br>Kampung</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="{{ route('masyarakat.index') }}" class="nav-link {{ Request::is('masyarakat') ? 'active' : '' }}" aria-current="page">
          <i class="fa-solid fa-house"></i>
          Home
        </a>
      </li>
      
      <li class="nav-item">
        <a href="{{ route('masyarakat.pengumuman') }}" class="nav-link {{ Request::is('masyarakat/pengumuman*') ? 'active' : '' }}" aria-current="page">
          <i class="fa-solid fa-bullhorn"></i>
          Pengumuman
        </a>
      </li>
      
      <li class="nav-item">
        <a href="{{ route('masyarakat.information') }}" class="nav-link {{ Request::is('masyarakat/informasi*') ? 'active' : '' }}" aria-current="page">
          <i class="fa-solid fa-circle-info"></i>
          Informasi
        </a>
      </li>
      
      <li class="nav-item">
        <a href="{{ route('masyarakat.pengaduan.index') }}" class="nav-link {{ Request::is('masyarakat/pengaduan*') ? 'active' : '' }}" aria-current="page">
          <i class="fa-solid fa-feather-pointed"></i>
          Pengaduan Masyarakat
        </a>
      </li>

    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <strong>{{ auth()->user()->name }}</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        {{-- <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li> --}}
        <li>
          <form action="{{ route('auth.logout') }}" method="post">
            @csrf
            <button type="submit" class="dropdown-item">
              <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
            </button>
          </form>
        </li>
      </ul>
    </div>
  </div>