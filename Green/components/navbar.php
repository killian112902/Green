<nav class="navbar navbar-expand-sm bg-transparent px-5">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <a class="navbar-brand" href="#">
      <img src="assets/logo/Logo.svg" alt="Green">
    </a>
    <ul class="navbar-nav ms-auto me-3 gap-3">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
    </ul>
    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#loginModal">
      <i class="fa-solid fa-user"></i> Login
    </button>

  </div>
</nav>
<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-black" id="loginModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/Green/auth/login.php" method="post">
        <div class="modal-body">
          <div id="loginError" class="alert alert-danger d-none" role="alert"></div>
          <div class="mb-3">
            <label for="email" class="form-label text-black">Email</label>
            <input type="email" class="form-control form-control-lg" id="email" name="email" required autofocus>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label text-black">Password</label>
            <div class="input-group">
              <input type="password" class="form-control form-control-lg" id="password" name="password" required aria-describedby="togglePassword">
              <button class="btn btn-outline-secondary" type="button" id="togglePassword" aria-label="Toggle password visibility">
                <i class="fa-regular fa-eye" id="togglePasswordIcon"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Sign in</button>
        </div>
      </form>
    </div>
  </div>
</div>
