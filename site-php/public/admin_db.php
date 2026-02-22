<?php
declare(strict_types=1);

/*
 * Admin SQLite minimal pour NutriThub
 * Accès: http://localhost:8080/admin_db.php?key=nutrithub
 */

const ADMIN_KEY = 'nutrithub'; 


if (($_GET['key'] ?? '') !== ADMIN_KEY) {
    http_response_code(403);
    echo "Accès refusé. Ajoute ?key=" . htmlspecialchars(ADMIN_KEY) . " à l'URL.";
    exit;
}


$dbPath = '/var/www/data/nutrithub.sqlite';

if (!file_exists($dbPath)) {
    http_response_code(500);
    echo "DB introuvable: " . htmlspecialchars($dbPath) . "<br>";
    echo "Vérifie que site-php/data/nutrithub.sqlite existe et que le volume est monté.";
    exit;
}

$pdo = new PDO('sqlite:' . $dbPath);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


$tables = $pdo->query("
    SELECT name
    FROM sqlite_master
    WHERE type='table' AND name NOT LIKE 'sqlite_%'
    ORDER BY name
")->fetchAll();

$table = (string)($_GET['table'] ?? ($tables[0]['name'] ?? ''));
$limit = (int)($_GET['limit'] ?? 50);
if ($limit < 1 || $limit > 500) $limit = 50;

$sql = (string)($_POST['sql'] ?? '');
$sqlResult = null;
$sqlError = null;


if ($sql !== '') {
    $trim = ltrim($sql);
    if (stripos($trim, 'select') !== 0) {
        $sqlError = "Seules les requêtes SELECT sont autorisées ici.";
    } else {
        try {
            $stmt = $pdo->query($sql);
            $sqlResult = $stmt->fetchAll();
        } catch (Throwable $e) {
            $sqlError = $e->getMessage();
        }
    }
}

function h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin DB - NutriThub</title>
  <style>
    body { font-family: system-ui, Arial, sans-serif; padding: 16px; }
    code { background: #f3f3f3; padding: 2px 6px; border-radius: 6px; }
    .row { display: flex; gap: 16px; flex-wrap: wrap; }
    .card { border: 1px solid #ddd; border-radius: 12px; padding: 12px; }
    table { border-collapse: collapse; width: 100%; }
    th, td { border: 1px solid #ddd; padding: 6px 8px; vertical-align: top; }
    th { background: #f7f7f7; text-align: left; }
    textarea { width: 100%; min-height: 90px; }
    .muted { opacity: .75; }
    .danger { color: #b00020; }
  </style>
</head>
<body>

<h1>Admin SQLite — NutriThub</h1>
<p class="muted">
  DB: <code><?= h($dbPath) ?></code> —
  Accès: <code>/admin_db.php?key=<?= h(ADMIN_KEY) ?></code>
</p>

<div class="row">
  <div class="card" style="min-width: 260px; flex: 1;">
    <h2>Tables</h2>
    <?php if (!$tables): ?>
      <p>Aucune table trouvée.</p>
    <?php else: ?>
      <ul>
        <?php foreach ($tables as $t): $name = (string)$t['name']; ?>
          <li>
            <a href="?key=<?= h(ADMIN_KEY) ?>&table=<?= h($name) ?>&limit=<?= (int)$limit ?>">
              <?= h($name) ?>
            </a>
            <?= $name === $table ? ' ←' : '' ?>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </div>

  <div class="card" style="flex: 3; min-width: 420px;">
    <h2>Afficher une table</h2>

    <?php if ($table === ''): ?>
      <p>Choisis une table à gauche.</p>
    <?php else: ?>
      <?php
        $count = (int)$pdo->query('SELECT COUNT(*) AS c FROM "' . str_replace('"','""',$table) . '"')->fetch()['c'];
      ?>
      <p>Table: <code><?= h($table) ?></code> — Total lignes: <strong><?= $count ?></strong></p>

      <form method="get" style="margin-bottom: 10px;">
        <input type="hidden" name="key" value="<?= h(ADMIN_KEY) ?>">
        <input type="hidden" name="table" value="<?= h($table) ?>">
        <label>Limit:
          <input type="number" name="limit" value="<?= (int)$limit ?>" min="1" max="500">
        </label>
        <button type="submit">Rafraîchir</button>
      </form>

      <?php
        $safeTable = str_replace('"','""',$table);
        $rows = $pdo->query('SELECT * FROM "' . $safeTable . '" ORDER BY rowid DESC LIMIT ' . (int)$limit)->fetchAll();
      ?>

      <?php if (!$rows): ?>
        <p>Aucune ligne.</p>
      <?php else: ?>
        <div style="overflow:auto;">
          <table>
            <tr>
              <?php foreach (array_keys($rows[0]) as $col): ?>
                <th><?= h((string)$col) ?></th>
              <?php endforeach; ?>
            </tr>
            <?php foreach ($rows as $r): ?>
              <tr>
                <?php foreach ($r as $v): ?>
                  <td><?= h(is_null($v) ? 'NULL' : (string)$v) ?></td>
                <?php endforeach; ?>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  </div>
</div>

<div class="card" style="margin-top: 16px;">
  <h2>Requête SQL (SELECT uniquement)</h2>
  <form method="post">
    <input type="hidden" name="key" value="<?= h(ADMIN_KEY) ?>">
    <textarea name="sql" placeholder="Ex: SELECT * FROM log ORDER BY rowid DESC LIMIT 20;"><?= h($sql) ?></textarea>
    <button type="submit">Exécuter</button>
  </form>

  <?php if ($sqlError): ?>
    <p class="danger"><strong>Erreur:</strong> <?= h($sqlError) ?></p>
  <?php elseif (is_array($sqlResult)): ?>
    <p>Résultats: <strong><?= count($sqlResult) ?></strong> ligne(s)</p>
    <?php if (count($sqlResult) > 0): ?>
      <div style="overflow:auto;">
        <table>
          <tr>
            <?php foreach (array_keys($sqlResult[0]) as $col): ?>
              <th><?= h((string)$col) ?></th>
            <?php endforeach; ?>
          </tr>
          <?php foreach ($sqlResult as $r): ?>
            <tr>
              <?php foreach ($r as $v): ?>
                <td><?= h(is_null($v) ? 'NULL' : (string)$v) ?></td>
              <?php endforeach; ?>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    <?php endif; ?>
  <?php endif; ?>
</div>

</body>
</html>