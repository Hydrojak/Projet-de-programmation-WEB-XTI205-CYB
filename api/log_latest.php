<?php
declare(strict_types=1);
require_once __DIR__ . '/db.php';

header('Content-Type: application/json; charset=utf-8');

$type = isset($_GET['type']) ? trim((string)$_GET['type']) : '';
$pdo = db();

if ($type !== '') {
  $stmt = $pdo->prepare("SELECT * FROM log WHERE type = :t ORDER BY id DESC LIMIT 1");
  $stmt->execute([':t' => $type]);
  $row = $stmt->fetch();
} else {
  $row = $pdo->query("SELECT * FROM log ORDER BY id DESC LIMIT 1")->fetch();
}

if (!$row) {
  echo json_encode(['log' => null], JSON_UNESCAPED_UNICODE);
  exit;
}

$row['inputs'] = json_decode((string)$row['inputs_json'], true);
$row['results'] = $row['results_json'] ? json_decode((string)$row['results_json'], true) : null;
unset($row['inputs_json'], $row['results_json']);

echo json_encode(['log' => $row], JSON_UNESCAPED_UNICODE);