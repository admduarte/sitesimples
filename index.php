<?php

require "sql/config.php";

$query = $conexao->prepare('SELECT id, menu, path, titulo FROM conteudo ORDER BY id');
$query->execute();
$conteudos = $query->fetchAll(PDO::FETCH_ASSOC);

$opcoesMenu = array();
foreach($conteudos as $conteudo)
{
    $opcoesMenu[$conteudo['path']] = array($conteudo['menu'],$conteudo['id']);
}

$rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

if ($rota['path']=='/busca')
{
    $menu = "busca";
    $titulo = 'Busca por "'.$_GET['texto'].'"';

    $query = $conexao->prepare('SELECT path, titulo FROM conteudo WHERE titulo like :texto OR codigoHtml like :texto');
    $query->bindValue("texto","%".$_GET['texto']."%",PDO::PARAM_STR);
    $query->execute();

    $conteudos = $query->fetchAll(PDO::FETCH_ASSOC);

    $codigoHtml = "";
    foreach($conteudos as $conteudo)
    {
        $codigoHtml .= "<a href='/".$conteudo['path']."'>". $conteudo['titulo']."</a><br>";
    }
    $codigoHtml .= "";


}
else
{
    $menu = ValidaPath($rota['path'],$opcoesMenu);

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