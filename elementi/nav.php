<?php
// elementi/nav.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$current = basename($_SERVER['PHP_SELF']); 
$user    = $_SESSION['username'] ?? null;
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">ProšećiMe</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <?php
          $links = [
            'index.php'       => 'Početna',
            'psi.php'         => 'Naši psi',
            'kako.php'        => 'Kako funkcionira?',
            'rezervacije.php' => 'Rezervacije',
            'onama.php'       => 'O nama'
          ];
          foreach ($links as $file => $title) {
            $active = ($current === $file) ? 'active' : '';
            echo "<li class='nav-item'><a class='nav-link $active' href='$file'>$title</a></li>";
          }
        ?>

        <?php if ($user): ?>
          <!-- Ako je prijavljen, prikazujemo korisničko ime i povezujemo ga na logout.php -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= htmlspecialchars($user) ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
              <li><a class="dropdown-item" href="logout.php">Odjava</a></li>
              <?php $role = $_SESSION['role'] ?? ''; if ($role === 'admin'): ?>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="admin.php">Admin panel</a></li>
              <?php else: ?>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="account.php">Vaš račun</a></li>
              <?php endif; ?>
            </ul>
          </li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link <?= ($current==='prijava.php'?'active':'') ?>" href="prijava.php">Prijava</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

