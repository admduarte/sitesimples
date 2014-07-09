<?php

$opcoesMenu = array(
    "home"=> ["Home","Bem vindo!!!"],
    "empresa"=> ["Empresa","Quem somos"],
    "produtos"=> ["Produtos","Nossos produtos"],
    "servicos"=> ["Servicos","Nossos serviços"],
    "contato"=> ["Contato","Fale conosco"]
);

$rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

$menu = ValidaPath($rota['path'],$opcoesMenu);

if ($menu!="404")
{
    $menuArquivo = $opcoesMenu[$menu][0];
    $titulo = $opcoesMenu[$menu][1];
}
else
{
    $titulo = "Referência inválida";
    $menuArquivo = "404";
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

    if (array_key_exists($path,$opcoes))
    {
        $destino = $path;
    }

    return $destino;
}