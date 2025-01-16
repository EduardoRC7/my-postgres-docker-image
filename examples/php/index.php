<?php

function loadEnv($file)
{
    if (file_exists($file)) {
        $lines = file($file);
        foreach ($lines as $line) {
            $line = rtrim($line);
            if (strpos($line, '=') !== false) {
                list($name, $value) = explode('=', $line, 2);
                putenv(trim($name) . '=' . trim($value));
            }
        }
    }
}

loadEnv(__DIR__ . '/../../.env');

$host = 'localhost';
$dbname = getenv('POSTGRES_DB');
$user = getenv('POSTGRES_USER');
$pass = getenv('POSTGRES_PASSWORD');

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM users";
    $stmt = $pdo->query($query);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['id'] . ' - ' . $row['name'] . ' - ' . $row['email'] . "<br>";
    }
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
