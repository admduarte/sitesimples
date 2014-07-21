<?php

try {
    $conexao = new PDO("mysql:host=localhost;dbname=sitesimples","root","root");
}
catch(\PDOException $e) {
    die("Ocorreu um erro de conexão: ".$e->getCode().": ".$e->getMessage());
}

$sql = file_get_contents('./fixture.sql');

$query = $conexao->prepare($sql);

if (!$query->execute())
{
    echo "Erro ".$query->errorCode().": ".$query->errorInfo();
}



