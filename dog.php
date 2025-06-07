<?php
session_start();
require_once __DIR__ . '/config/config.php';

// 1) Dohvat psa
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

// 2) Dohvat rezervacija
$stmt = $pdo->prepare("SELECT id, reserved_for, reserved_by_user FROM reservations WHERE dog_id = ? ORDER BY reserved_for");
$stmt->execute([$dog_id]);
$reservations = $stmt->fetchAll();
$reserved = [];
foreach ($reservations as $r) {
    $reserved[$r['reserved_for']] = ['id'=>$r['id'],'user'=>$r['reserved_by_user']];
}

// 3) Obrada POST za rezerviranje ili brisanje
$feedback = '';
if ($_SERVER['REQUEST_METHOD']==='POST') {
    // Admin briše rezervaciju
    if (isset($_POST['delete_id']) && ($_SESSION['is_admin'] ?? false)) {
        $pdo->prepare("DELETE FROM reservations WHERE id = ?")
            ->execute([(int)$_POST['delete_id']]);
        $feedback = "Rezervacija obrisana.";
    }
    // Korisnik rezervira datum
    if (isset($_POST['reserve_date']) && isset($_SESSION['user_id'])) {
        $d = $_POST['reserve_date'];
        if (!isset($reserved[$d])) {
            $pdo->prepare("INSERT INTO reservations(dog_id,reserved_for,reserved_by_user) VALUES(?,?,?)")
                ->execute([$dog_id,$d,$_SESSION['user_id']]);
            $feedback = "Rezervirano za $d.";
        } else {
            $feedback = "Datum je već rezerviran.";
        }
    }
    // osvježimo rezervacije
    $stmt->execute([$dog_id]);
    $reservations = $stmt->fetchAll();
    $reserved = [];
    foreach ($reservations as $r) {
        $reserved[$r['reserved_for']] = ['id'=>$r['id'],'user'=>$r['reserved_by_user']];
    }
}

// 4) Funkcija za iscrtavanje kalendara tekućeg mjeseca
function renderCalendar($year, $month, $reserved) {
    $days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $firstWeekday = (int)date('w', strtotime("$year-$month-01"));
    $html = '<table class="table table-bordered text-center" id="calendarTable">';
    $html .= '<thead class="table-light"><tr>';
    foreach (['Ned','Pon','Uto','Sri','Čet','Pet','Sub'] as $wd) {
        $html .= "<th>$wd</th>";
    }
    $html .= '</tr></thead><tbody><tr>';
    // prazni
    for ($i=0;$i<$firstWeekday;$i++) {
        $html .= '<td></td>';
    }
    for ($day=1;$day<=$days;$day++) {
        $date = sprintf('%04d-%02d-%02d',$year,$month,$day);
        if (isset($reserved[$date])) {
            $html .= "<td class=\"bg-danger text-white\">$day</td>";
        } else {
            $html .= "<td class=\"bg-success text-white\">";
            $html .= "<form method=\"post\" style=\"margin:0;\">";
            $html .= "<button name=\"reserve_date\" value=\"$date\" class=\"btn btn-sm btn-success\">$day</button>";
            $html .= "</form></td>";
        }
        if (date('w', strtotime($date)) == 6 && $day != $days) {
            $html .= '</tr><tr>';
        }
    }
    $lastWeekday = (int)date('w', strtotime("$year-$month-$days"));
    if ($lastWeekday < 6) {
        for ($i=$lastWeekday+1;$i<=6;$i++) {
            $html .= '<td></td>';
        }
    }
    $html .= '</tr></tbody></table>';
    return $html;
}

$year = date('Y');
$month = date('n');
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
    <!-- Postojeći sadržaj stranice za pojedinog psa -->
    <h1 class="mb-3"><?=htmlspecialchars($dog['name'])?></h1>
    <p>
      <strong>Pasmina:</strong> <?=htmlspecialchars($dog['breed'])?><br>
      <strong>Rođendan:</strong> <?=date('j.n.Y',strtotime($dog['dob']))?><br>
      <strong>Temperament:</strong> <?=htmlspecialchars($dog['temperament'])?>
    </p>
    <img src="img/<?=htmlspecialchars($dog['image'])?>" class="img-fluid mb-4" style="max-width:300px;" alt="<?=htmlspecialchars($dog['name'])?>">

    <?php if ($feedback): ?>
      <div class="alert alert-info"><?=htmlspecialchars($feedback)?></div>
    <?php endif; ?>

    <!-- NOVO: kalendar rezervacija -->
    <h2 class="mt-4">Rezervacije</h2>
    <?= renderCalendar($year, $month, $reserved) ?>

    <!-- Admin: tabela za brisanje -->
    <?php if (!empty($_SESSION['is_admin'])): ?>
      <h3 class="mt-4">Uredi rezervacije</h3>
      <table class="table table-sm table-bordered w-auto">
        <thead class="table-light"><tr><th>Datum</th><th>User ID</th><th>Akcija</th></tr></thead>
        <tbody>
        <?php foreach ($reservations as $r): ?>
          <tr>
            <td><?=htmlspecialchars($r['reserved_for'])?></td>
            <td><?=htmlspecialchars($r['reserved_by_user'])?></td>
            <td>
              <form method="post" style="margin:0;">
                <button name="delete_id" value="<?=$r['id']?>" class="btn btn-sm btn-danger">Obriši</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>

    <!-- Obavijest za goste -->
    <?php if (empty($_SESSION['user_id'])): ?>
      <p class="text-warning mt-3">
        Za rezervaciju se <a href="prijava.php">prijavite</a>.
      </p>
    <?php endif; ?>
  </main>

  <?php include __DIR__.'/elementi/footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
