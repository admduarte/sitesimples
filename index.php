<?php

$opcoesMenu = array(
    "home"=> ["Home",1],
    "empresa"=> ["Empresa",2],
    "produtos"=> ["Produtos",3],
    "servicos"=> ["Servicos",4],
    "contato"=> ["Contato",5]
);

$rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

$menu = ValidaPath($rota['path'],$opcoesMenu);

try {
    $conexao = new PDO("mysql:host=localhost;dbname=sitesimples","root","root");
}
catch(\PDOException $e) {
    die("Ocorreu um erro de conexão: ".$e->getCode().": ".$e->getMessage());
}


if ($menu!="404")
{
    if ($menu=="") $menu="home";

    $query = $conexao->prepare("SELECT * FROM conteudo WHERE id=:id");
    $query->bindValue("id",$opcoesMenu[$menu][1]);
    $query->execute();

    $conteudo = $query->fetch(PDO::FETCH_ASSOC);

    $titulo = $conteudo['titulo'];
    $codigoHtml = $conteudo['codigoHtml'];

}
else
{
    $titulo = "Referência inválida";
    $codigoHtml = "";
}

$insMenu = "";
foreach ($opcoesMenu as $opc => $itemMenu)
{
	$insMenu .= '<li'.($menu==$opc?' class="active"':'').'> <a href="'.$opc.'"> '.$itemMenu[0].' </a> </li>';
}
 
require "view/layout.php";


function ValidaPath($path,$opcoes)
{
    $destino = "404";
    $path = str_replace("/","",$path);

    if (array_key_exists($path,$opcoes) || ($path==""))
    {
        $destino = $path;
    }

    return $destino;
}