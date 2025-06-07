<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>O nama | ProšećiMe</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="onama.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
 <?php include('elementi/nav.php')?>


<main class="container py-5">
  <h1 class="fw-bold text-center mb-4">Naša priča</h1>
  <p class="lead mb-5">Projekt ProšećiMe pokrenut je 2024. kako bismo sklonišnim psima pružili više šetnji i brže udomljenje. Danas imamo stotine volontera i tisuće odrađenih izlazaka. Svaki novi šetač pomaže socijalizirati pse i povećava njihove šanse za pronalaskom trajnog doma.</p>
  <div class="ratio ratio-16x9 mb-4">
    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Video" allowfullscreen></iframe>
  </div>
  <div class="row g-4 mb-5">
    <div class="col-md-6"><h4 class="fw-semibold">Kontakt</h4><ul class="list-unstyled"><li>E‑mail: info@prosecime.hr</li><li>Telefon: +385 91 123 4567</li><li>Adresa: Primorska 1, Zagreb</li></ul></div>
    <div class="col-md-6"><h4 class="fw-semibold">Radno vrijeme</h4><p>Pon‑Pet: 09‑17 h<br>Sub: 10‑14 h<br>Ned: zatvoreno</p></div>
  </div>
  <div class="mb-5" style="height:300px">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2793.498!2d16.082!3d45.814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765d6b558b3f8fb%3A0xaad477dbb2b6b0b8!2sSkloni%C5%A1te%20Dumovec!5e0!3m2!1shr!2shr!4v00000000000" width="100%" height="100%" style="border:0" allowfullscreen loading="lazy"></iframe>
  </div>
  <h2 class="text-center fw-bold mb-4">Recenzije šetača</h2>
  <div class="row g-4">
    <div class="col-md-4"><div class="card h-100 shadow-sm p-3"><p class="fst-italic mb-2">„Subotnja šetnja s Askom mi je uljepšala tjedan!“</p><h6 class="fw-semibold mb-0">Ana</h6><small class="text-muted">Google</small></div></div>
    <div class="col-md-4"><div class="card h-100 shadow-sm p-3"><p class="fst-italic mb-2">„Odlično organizirano, psi presretni.“</p><h6 class="fw-semibold mb-0">Marko</h6><small class="text-muted">Facebook</small></div></div>
    <div class="col-md-4"><div class="card h-100 shadow-sm p-3"><p class="fst-italic mb-2">„Najbolji način za provesti aktivno popodne.“</p><h6 class="fw-semibold mb-0">Sara</h6><small class="text-muted">Instagram</small></div></div>
  </div>
</main>

 <?php include('elementi/footer.php')?>

<script>const u=localStorage.getItem('username');if(u){document.getElementById('loginBtn').textContent=u;}</script>
</body>
</html>
