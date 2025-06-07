<?php
session_start();
require_once __DIR__ . '/config/config.php';

if (!isset($_GET['id'])) {
    header('Location: psi.php');
    exit;
}
$dog_id = (int)$_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM dogs WHERE id = ?");
$stmt->execute([$dog_id]);
$dog = $stmt->fetch();
if (!$dog) {
    echo "Pas nije pronađen.";
    exit;
}

$additional = [];
$base = pathinfo($dog['image'], PATHINFO_FILENAME);
for ($i = 1; $i <= 3; $i++) {
    $candidate = "img/{$base}_$i.jpeg";
    if (file_exists(__DIR__ . "/$candidate")) {
        $additional[] = $candidate;
    }
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?=htmlspecialchars($dog['name'])?> | ProšećiMe</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include __DIR__.'/elementi/nav.php'; ?>
<main class="container py-5">
  <h1 class="mb-3"><?=htmlspecialchars($dog['name'])?></h1>
  <p>
    <strong>Pasmina:</strong> <?=htmlspecialchars($dog['breed'])?><br>
    <strong>Rođendan:</strong> <?=date('j.n.Y',strtotime($dog['dob']))?><br>
    <strong>Temperament:</strong> <?=htmlspecialchars($dog['temperament'])?>
  </p>
  <div class="row g-3 mb-4">
    <div class="col-md-4">
      <img src="img/<?=htmlspecialchars($dog['image'])?>" class="img-fluid rounded" alt="<?=htmlspecialchars($dog['name'])?>">
    </div>
<?php foreach ($additional as $img): ?>
    <div class="col-md-4">
      <img src="<?=htmlspecialchars($img)?>" class="img-fluid rounded" alt="<?=htmlspecialchars($dog['name'])?>">
    </div>
<?php endforeach; ?>
  </div>
  <p>Za rezervacije posjetite stranicu <a href="rezervacije.php">Rezervacije</a>.</p>
</main>
<?php include __DIR__.'/elementi/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
