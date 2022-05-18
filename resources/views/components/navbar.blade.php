  <nav class="navbar  navbar-expand-lg navbar-dark p-md-3 justify-inline bg-own-green borderBottom-color-yellow">
      <div class="container">

          <a href="{{ route('home') }}" class="navbar-brand">
              <img src="{{ URL('images/logo.jpg') }}" alt="img" class="fluid rounded-circle border-color-yellow"
                  width="80px">
          </a>

          <ul class="navbar-nav m-2 mt-lg-0">
              <li class="nav-button nav-item active border p-1 border-light mx-1">
                  <a href="{{ route('Recepie.index') }}" class="nav-link active">
                      Recepies
                  </a>
              </li>

              <li class="nav-button nav-item active border p-1 border-light mx-1">
                  <a href="/Blog" class="nav-link" style="pointer-events: none" inactiv>
                      Blog
                  </a>
              </li>

              <li class="nav-button nav-item active border p-1 border-light mx-1">
                  <a href="/Community" class="nav-link " style="pointer-events: none">
                      Community
                  </a>
              </li>

              <li class="nav-item active mx-1 ">
                  <a href="{{ route('userView') }}" class="nav-link ">
                      <i class="bi bi-person " style="font-size:1.6em"></i>
                  </a>
              </li>
          </ul>

      </div>
  </nav>
