<?php

$db = array(
            "type" => "mysql",
            "host" => "localhost",
            "database" => "sitesimples",
            "user" => "root",
            "password" => "root"
);

try {
    $conexao = new PDO($db["type"].":host=".$db["host"].";dbname=".$db["database"],
                        $db["user"],
                        $db["password"]);
}
catch(\PDOException $e) {
    die("Ocorreu um erro de conexão: ".$e->getCode().": ".$e->getMessage());
}

;