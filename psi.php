<?php
session_start();
?>
<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Naši psi | ProšećiMe</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="img/paw.svg" type="image/svg+xml">
  <link rel="stylesheet" href="css/psi.css">
</head>
<body>
  <?php include __DIR__ . '/elementi/nav.php'; ?>

  <main class="container py-5">
    <h1 class="fw-bold text-center mb-4">Naši psi</h1>

    <div class="row g-3 mb-5" id="filters">
      <div class="col-md-3">
        <select id="sizeFilter" class="form-select">
          <option value="">Veličina (sve)</option>
          <option value="mali">Mali</option>
          <option value="srednji">Srednji</option>
          <option value="veliki">Veliki</option>
        </select>
      </div>
      <div class="col-md-3">
        <select id="ageFilter" class="form-select">
          <option value="">Starost (sve)</option>
          <option value="stenci">Štenci</option>
          <option value="mlad">Mladi</option>
          <option value="odrasli">Odrasli</option>
          <option value="stariji">Stariji</option>
        </select>
      </div>
      <div class="col-md-3">
        <select id="tempFilter" class="form-select">
          <option value="">Temperament (svi)</option>
          <option value="mirna">Mirna</option>
          <option value="energicna">Energična</option>
        </select>
      </div>
      <div class="col-md-3 text-md-end">
        <button class="btn btn-secondary" id="resetFilters">Resetiraj</button>
      </div>
    </div>

    <div class="row g-4" id="dogsGrid">
      <!-- 1 -->
      <div class="col-md-3 dog-card" data-size="srednji" data-age="odrasli" data-temp="energicna">
        <a href="dog.php?id=1" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm">
            <img src="img/campi.jpeg" class="card-img-top" alt="Campi">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Campi</h5>
              <p class="small mb-1">Križani terijer, 5.6.2018.</p>
              <span class="badge bg-info">Energična</span>
              <p class="card-text mt-2">Dobara je i voli razgovarati sa susjedima.</p>
            </div>
          </div>
        </a>
      </div>

      <!-- 2 -->
      <div class="col-md-3 dog-card" data-size="mali" data-age="mlad" data-temp="mirna">
        <a href="dog.php?id=2" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm">
            <img src="img/zetta.jpeg" class="card-img-top" alt="Zetta">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Zetta</h5>
              <p class="small mb-1">Križani terijer, 8.6.2023.</p>
              <span class="badge bg-success">Mirna</span>
              <p class="card-text mt-2">Mlad pas, povučen, treba povremeni dodir s ljudima.</p>
            </div>
          </div>
        </a>
      </div>

      <!-- 3 -->
      <div class="col-md-3 dog-card" data-size="mali" data-age="stenci" data-temp="energicna">
        <a href="dog.php?id=3" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm">
            <img src="img/blanco.jpeg" class="card-img-top" alt="Blanco">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Blanco</h5>
              <p class="small mb-1">Križani terijer, 3.3.2025.</p>
              <span class="badge bg-info">Energičan</span>
              <p class="card-text mt-2">Štene, razigran, voli istraživati i trčkarati.</p>
            </div>
          </div>
        </a>
      </div>

      <!-- 4 -->
      <div class="col-md-3 dog-card" data-size="veliki" data-age="odrasli" data-temp="mirna">
        <a href="dog.php?id=4" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm">
            <img src="img/sniper.jpeg" class="card-img-top" alt="Sniper">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Sniper</h5>
              <p class="small mb-1">Križani ovčar, 24.7.2018.</p>
              <span class="badge bg-success">Miran</span>
              <p class="card-text mt-2">Mlad po energiji, ali voli mirne šetnje i pažljivo motri okolinu.</p>
            </div>
          </div>
        </a>
      </div>

      <!-- 5 -->
      <div class="col-md-3 dog-card" data-size="mali" data-age="stenci" data-temp="energicna">
        <a href="dog.php?id=5" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm">
            <img src="img/tijara.jpeg" class="card-img-top" alt="Tijara">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Tijara</h5>
              <p class="small mb-1">Križani terijer, 25.2.2025.</p>
              <span class="badge bg-info">Energična</span>
              <p class="card-text mt-2">Štene, razigrana i znatiželjna, voli trčkarati po dvorištu.</p>
            </div>
          </div>
        </a>
      </div>

      <!-- 6 -->
      <div class="col-md-3 dog-card" data-size="veliki" data-age="odrasli" data-temp="mirna">
        <a href="dog.php?id=6" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm">
            <img src="img/archy.jpeg" class="card-img-top" alt="Archy">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Archy</h5>
              <p class="small mb-1">Križani ovčar, 10.12.2019.</p>
              <span class="badge bg-success">Miran</span>
              <p class="card-text mt-2">Odrastao pas, smiren, voli pažljive šetnje.</p>
            </div>
          </div>
        </a>
      </div>

      <!-- 7 -->
      <div class="col-md-3 dog-card" data-size="mali" data-age="stenci" data-temp="mirna">
        <a href="dog.php?id=7" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm">
            <img src="img/sally.jpeg" class="card-img-top" alt="Sally">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Sally</h5>
              <p class="small mb-1">Križani pekinezer, 10.1.2025.</p>
              <span class="badge bg-success">Mirna</span>
              <p class="card-text mt-2">Štene, povučena, voli tiho promatrati okolinu.</p>
            </div>
          </div>
        </a>
      </div>

      <!-- 8 -->
      <div class="col-md-3 dog-card" data-size="srednji" data-age="mlad" data-temp="energicna">
        <a href="dog.php?id=8" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm">
            <img src="img/dasa.jpeg" class="card-img-top" alt="Daša">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Daša</h5>
              <p class="small mb-1">Križani gonič, 15.8.2023.</p>
              <span class="badge bg-info">Energična</span>
              <p class="card-text mt-2">Mlada, znatiželjna, voli istrčavanja i društvo ljudi.</p>
            </div>
          </div>
        </a>
      </div>

      <!-- 9 -->
      <div class="col-md-3 dog-card" data-size="mali" data-age="stenci" data-temp="energicna">
        <a href="dog.php?id=9" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm">
            <img src="img/chico.jpeg" class="card-img-top" alt="Chico">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Chico</h5>
              <p class="small mb-1">Križani terijer, 3.3.2025.</p>
              <span class="badge bg-info">Energičan</span>
              <p class="card-text mt-2">Štene, razigran, voli dovoditi loptu.</p>
            </div>
          </div>
        </a>
      </div>

      <!-- 10 -->
      <div class="col-md-3 dog-card" data-size="srednji" data-age="odrasli" data-temp="mirna">
        <a href="dog.php?id=10" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm">
            <img src="img/brut.jpeg" class="card-img-top" alt="Brut">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Brut</h5>
              <p class="small mb-1">Križanac, 13.10.2019.</p>
              <span class="badge bg-success">Miran</span>
              <p class="card-text mt-2">Odrastao, ne voli druge pse, voli šetnje i mir.</p>
            </div>
          </div>
        </a>
      </div>

      <!-- 11 -->
      <div class="col-md-3 dog-card" data-size="veliki" data-age="stariji" data-temp="mirna">
        <a href="dog.php?id=11" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm">
            <img src="img/maya.jpeg" class="card-img-top" alt="Maya">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Maya</h5>
              <p class="small mb-1">Križani sibirski husky, 16.1.2015.</p>
              <span class="badge bg-success">Mirna</span>
              <p class="card-text mt-2">Stariji pas, tiha i prijateljska, voli duge šetnje u hladovini.</p>
            </div>
          </div>
        </a>
      </div>

      <!-- 12 -->
      <div class="col-md-3 dog-card" data-size="veliki" data-age="mlad" data-temp="energicna">
        <a href="dog.php?id=12" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm">
            <img src="img/ariel.jpeg" class="card-img-top" alt="Ariel">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Ariel</h5>
              <p class="small mb-1">Križana doga, 22.11.2022.</p>
              <span class="badge bg-info">Energična</span>
              <p class="card-text mt-2">Mlad pas, pun energije, traži aktivne šetnje.</p>
            </div>
          </div>
        </a>
      </div>

      <!-- 13 -->
      <div class="col-md-3 dog-card" data-size="mali" data-age="stariji" data-temp="mirna">
        <a href="dog.php?id=13" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm">
            <img src="img/melly.jpeg" class="card-img-top" alt="Melly">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Melly</h5>
              <p class="small mb-1">Križani pekinezer, 29.3.2015.</p>
              <span class="badge bg-success">Mirna</span>
              <p class="card-text mt-2">Starija, mazna i povremeno voli kratak odlazak u dvorištu.</p>
            </div>
          </div>
        </a>
      </div>

      <!-- 14 -->
      <div class="col-md-3 dog-card" data-size="veliki" data-age="mlad" data-temp="energicna">
        <a href="dog.php?id=14" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm">
            <img src="img/sime.jpeg" class="card-img-top" alt="Šime">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Šime</h5>
              <p class="small mb-1">Križani rottweiler, 20.6.2023.</p>
              <span class="badge bg-info">Energičan</span>
              <p class="card-text mt-2">Mlad, jak i voli trčkaranje po dvorištu.</p>
            </div>
          </div>
        </a>
      </div>

      <!-- 15 -->
      <div class="col-md-3 dog-card" data-size="mali" data-age="stenci" data-temp="energicna">
        <a href="dog.php?id=15" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm">
            <img src="img/zora.jpeg" class="card-img-top" alt="Zora">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Zora</h5>
              <p class="small mb-1">Križani ovčar, 1.3.2025.</p>
              <span class="badge bg-info">Energična</span>
              <p class="card-text mt-2">Štene, znatiželjna i vesela, traži puno igre.</p>
            </div>
          </div>
        </a>
      </div>

      <!-- 16 -->
      <div class="col-md-3 dog-card" data-size="veliki" data-age="odrasli" data-temp="mirna">
        <a href="dog.php?id=16" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm">
            <img src="img/lili.jpeg" class="card-img-top" alt="Lili">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Lili</h5>
              <p class="small mb-1">Križani šarplaninac, 1.3.2017.</p>
              <span class="badge bg-success">Mirna</span>
              <p class="card-text mt-2">Odrastao pas, odan i opušten, voli miran kutak.</p>
            </div>
          </div>
        </a>
      </div>

      <!-- 17 -->
      <div class="col-md-3 dog-card" data-size="srednji" data-age="stariji" data-temp="mirna">
        <a href="dog.php?id=17" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm">
            <img src="img/ella.jpeg" class="card-img-top" alt="Ella">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Ella</h5>
              <p class="small mb-1">Križani ptičar, 15.3.2012.</p>
              <span class="badge bg-success">Mirna</span>
              <p class="card-text mt-2">Starija, mirna i voli istraživati tiha područja.</p>
            </div>
          </div>
        </a>
      </div>

      <!-- 18 -->
      <div class="col-md-3 dog-card" data-size="srednji" data-age="stariji" data-temp="mirna">
        <a href="dog.php?id=18" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm">
            <img src="img/prometej.jpeg" class="card-img-top" alt="Prometej">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Prometej</h5>
              <p class="small mb-1">Križani terijer, 7.5.2012.</p>
              <span class="badge bg-success">Miran</span>
              <p class="card-text mt-2">Stariji, odan i posvećen svom čovjeku.</p>
            </div>
          </div>
        </a>
      </div>

      <!-- 19 -->
      <div class="col-md-3 dog-card" data-size="veliki" data-age="stariji" data-temp="mirna">
        <a href="dog.php?id=19" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm">
            <img src="img/nelly.jpeg" class="card-img-top" alt="Nelly">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Nelly</h5>
              <p class="small mb-1">Križani ovčar, 26.10.2011.</p>
              <span class="badge bg-success">Mirna</span>
              <p class="card-text mt-2">Starija, tiha i prijateljska, voli maziti se.</p>
            </div>
          </div>
        </a>
      </div>

      <!-- 20 -->
      <div class="col-md-3 dog-card" data-size="srednji" data-age="odrasli" data-temp="mirna">
        <a href="dog.php?id=20" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm">
            <img src="img/lora.jpeg" class="card-img-top" alt="Lora">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Lora</h5>
              <p class="small mb-1">Križani terijer, 4.10.2020.</p>
              <span class="badge bg-success">Mirna</span>
              <p class="card-text mt-2">Odrasla, umjerena energija, voli povremene igre.</p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </main>

  <?php include __DIR__ . '/elementi/footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/filters.js"></script>
</body>
</html>
