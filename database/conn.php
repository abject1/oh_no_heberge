<?php

$dns = 'mysql:host=localhost;dbname=oh_no_heberge';
$user = 'root';
$psw = '';

try {
    $pdo = new PDO($dns, $user, $psw, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    return;
} catch (PDOException $e) {
    echo "ERROR : " .  $e->getMessage();
}

return $pdo;
