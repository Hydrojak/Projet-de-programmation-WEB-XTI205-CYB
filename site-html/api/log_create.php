<?php
declare(strict_types=1);
require_once __DIR__ . '/db.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  echo json_encode(['error' => 'method not allowed']);
  exit;
}

$payload = json_decode(file_get_contents('php://input'), true);
if (!is_array($payload)) {
  http_response_code(400);
  echo json_encode(['error' => 'invalid json']);
  exit;
}

$type = trim((string)($payload['type'] ?? ''));
$inputs = $payload['inputs'] ?? null;
$results = $payload['results'] ?? null;

if ($type === '' || !is_array($inputs)) {
  http_response_code(400);
  echo json_encode(['error' => 'missing type or inputs']);
  exit;
}

$pdo = db();
$stmt = $pdo->prepare("
  INSERT INTO log (
    type, sexe, poids_kg, taille_cm, age, activite, objectif, goal, niveau_prot, bodyfat,
    nom, email, message,
    inputs_json, results_json
  ) VALUES (
    :type, :sexe, :poids_kg, :taille_cm, :age, :activite, :objectif, :goal, :niveau_prot, :bodyfat,
    :nom, :email, :message,
    :inputs_json, :results_json
  )
");

$stmt->execute([
  ':type' => $type,
  ':sexe' => $payload['sexe'] ?? null,
  ':poids_kg' => $payload['poids_kg'] ?? null,
  ':taille_cm' => $payload['taille_cm'] ?? null,
  ':age' => $payload['age'] ?? null,
  ':activite' => $payload['activite'] ?? null,
  ':objectif' => $payload['objectif'] ?? null,
  ':goal' => $payload['goal'] ?? null,
  ':niveau_prot' => $payload['niveau_prot'] ?? null,
  ':bodyfat' => $payload['bodyfat'] ?? null,
  ':nom' => $payload['nom'] ?? null,
  ':email' => $payload['email'] ?? null,
  ':message' => $payload['message'] ?? null,

  ':inputs_json' => json_encode($inputs, JSON_UNESCAPED_UNICODE),
  ':results_json' => is_array($results) ? json_encode($results, JSON_UNESCAPED_UNICODE) : null,
]);

echo json_encode(['ok' => true, 'id' => (int)$pdo->lastInsertId()], JSON_UNESCAPED_UNICODE);