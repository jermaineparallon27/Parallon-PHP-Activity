<ul class="navbar-nav mx-auto">
  <li class="nav-item"><a class="nav-link" href="#destinations">Destinations</a></li>
  <li class="nav-item"><a class="nav-link" href="#why">Why Batangas</a></li>
  <li class="nav-item"><a class="nav-link" href="#book">Book</a></li>
</ul>
<div class="d-flex align-items-center gap-2">
  <span class="nav-link text-white">Signed in as <strong id="nav-username"><?= e($_SESSION['user'] ?? '') ?></strong></span>
  <a class="btn btn-glass" id="logout" href="logout.php">Log out</a>
</div>
