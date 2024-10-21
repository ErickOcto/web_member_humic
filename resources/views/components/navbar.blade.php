            <nav class="navbar navbar-expand-lg bg-white">
              <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="https://humic.telkomuniversity.ac.id/wp-content/uploads/2020/06/logo-humic-text.png" alt="Logo" width="160" class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-4">
                      <a class="nav-link {{ request()->is('/') ? 'active' : null }}" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item mx-4">
                      <a class="nav-link {{ request()->is('about') ? 'active' : null }}" href="{{ route('about') }}">About Us</a>
                    </li>
                    <li class="nav-item mx-4">
                      <a class="nav-link {{ request()->is('statistics') ? 'active' : null }}" href="{{ route('statistics') }}">Statistics</a>
                    </li>
                    <li class="nav-item mx-4">
                      <a class="nav-link {{ request()->is('project_gallery') ? 'active' : null }}" href="{{ route('project_gallery') }}">Project Gallery</a>
                    </li>
                    <li class="nav-item mx-4">
                      <a class="nav-link {{ request()->is('contact') ? 'active' : null }}" href="{{ route('contact') }}">Contact Us</a>
                    </li>
                  </ul>
                    <a href="{{ route('login') }}" class="btn btn-outline-dark" style="width: 160px;">LOGIN</a>
                </div>
              </div>
            </nav>
