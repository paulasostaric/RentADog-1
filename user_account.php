<?php
session_start();
require_once __DIR__.'/config/config.php';
if(($_SESSION['role'] ?? '') !== 'admin'){
    header('Location: index.php');
    exit;
}
if(!isset($_GET['id'])){
    header('Location: admin.php?tab=users');
    exit;
}
$user_id = (int)$_GET['id'];
$stmt = $pdo->prepare('SELECT id, username FROM users WHERE id=?');
$stmt->execute([$user_id]);
$account = $stmt->fetch();
if(!$account){
    echo 'Korisnik nije pronađen.';
    exit;
}
$res = $pdo->prepare('SELECT r.id,d.name,r.reserved_for,r.duration,r.location FROM reservations r JOIN dogs d ON r.dog_id=d.id WHERE r.reserved_by_user=? ORDER BY r.reserved_for DESC');
$res->execute([$user_id]);
$reservations = $res->fetchAll();
?>
<!DOCTYPE html>
<html lang="hr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Račun - <?= htmlspecialchars($account['username']) ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include __DIR__.'/elementi/nav.php'; ?>
<div class="container py-5">
<h1 class="mb-4">Račun korisnika <?= htmlspecialchars($account['username']) ?></h1>
<?php if($reservations): ?>
<table class="table table-bordered">
<thead><tr><th>ID</th><th>Pas</th><th>Datum</th><th>Trajanje</th><th>Lokacija</th></tr></thead>
<tbody>
<?php foreach($reservations as $r): ?>
<tr>
  <td><?= $r['id'] ?></td>
  <td><?= htmlspecialchars($r['name']) ?></td>
  <td><?= htmlspecialchars($r['reserved_for']) ?></td>
  <td><?= (int)$r['duration'] ?> min</td>
  <td><?= htmlspecialchars($r['location']) ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php else: ?>
<p>Nema rezervacija.</p>
<?php endif; ?>
<p><a href="admin.php?tab=users" class="btn btn-secondary">Natrag</a></p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
