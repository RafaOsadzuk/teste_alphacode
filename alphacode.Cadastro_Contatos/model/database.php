<?php
$host = 'localhost';
$dbname = 'contatos';
$username = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$dbname";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {
    echo "ERRO ao conectar com o banco de dados: " . $e->getMessage() . "<br>";
    echo "Erro código: " . $e->getCode() . "<br>";
    echo "Erro linha: " . $e->getLine() . "<br>";
    echo "Erro arquivo: " . $e->getFile() . "<br>";
}

if ($pdo) {
    echo "Conexão estabelecida com sucesso!";
    echo "Server version: " . $pdo->getAttribute(PDO::ATTR_SERVER_VERSION) . "<br>";

    // Testar se o banco de dados está conectado
    $stmt = $pdo->query('SELECT 1');
    if ($stmt) {
        echo "Banco de dados conectado com sucesso!";
    } else {
        echo "Erro ao conectar com o banco de dados!";
    }
} else {
    echo "Erro ao estabelecer conexão!";
}