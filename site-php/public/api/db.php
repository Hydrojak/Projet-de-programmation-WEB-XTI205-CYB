<?php
declare(strict_types=1);

function db(): PDO {

    $path = '/var/www/data/nutrithub.sqlite';

    if (!is_dir('/var/www/data')) {
        mkdir('/var/www/data', 0775, true);
    }

    $pdo = new PDO('sqlite:' . $path);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    return $pdo;
}