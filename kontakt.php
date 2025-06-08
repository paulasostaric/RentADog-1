<?php
session_start();
?>
<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kontakt | ProšećiMe</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="img/paw.svg" type="image/svg+xml">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php include('elementi/nav.php'); ?>
<main class="container py-5">
  <h1 class="fw-bold text-center mb-4">Kontakt</h1>
  <div class="row g-4 mb-5">
    <div class="col-md-6">
      <h4 class="fw-semibold">Radno vrijeme</h4>
      <p>Pon‑Pet: 09‑17 h<br>Sub: 10‑14 h<br>Ned: zatvoreno</p>
      <form class="mt-4">
        <div class="mb-3">
          <label class="form-label">Ime</label>
          <input type="text" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">E‑mail</label>
          <input type="email" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Poruka</label>
          <textarea class="form-control" rows="4" required></textarea>
        </div>
        <button class="btn btn-primary">Pošalji</button>
      </form>
    </div>
    <div class="col-md-6">
      <h4 class="fw-semibold">Lokacija</h4>
      <div style="height:300px">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2793.498!2d16.082!3d45.814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765d6b558b3f8fb%3A0xaad477dbb2b6b0b8!2sSkloni%C5%A1te%20Dumovec!5e0!3m2!1shr!2shr!4v0000000000" width="100%" height="100%" style="border:0" allowfullscreen loading="lazy"></iframe>
      </div>
    </div>
  </div>
  <div class="text-center">
    <a href="#" class="text-dark me-3"><i class="bi bi-facebook fs-3"></i></a>
    <a href="#" class="text-dark me-3"><i class="bi bi-instagram fs-3"></i></a>
    <a href="#" class="text-dark"><i class="bi bi-twitter fs-3"></i></a>
  </div>
</main>
<?php include('elementi/footer.php'); ?>
</body>
</html>
