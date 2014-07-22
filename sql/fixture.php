<?php

phpinfo();
try {
    $conexao = new PDO("mysql:host=localhost;dbname=sitesimples","root","root");
}
catch(\PDOException $e) {
    phpinfo();

    die("Ocorreu um erro de conexão: ".$e->getCode().": ".$e->getMessage());
}

$sql = file_get_contents('\sql\fixture.sql');

$query = $conexao->prepare($sql);
$query->execute();



