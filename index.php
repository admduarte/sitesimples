<?php

$opcoesMenu = array(
	"Home"=>"Bem vindo!!!",
	"Empresa"=>"Quem somos",
	"Produtos"=>"Nossos produtos",
	"Serviços"=>"Nossos serviços",
	"Contato"=>"Fale conosco"
	);

$menu = ($_GET['menu']==""?"Home":$_GET['menu']);
$titulo = $opcoesMenu[$menu];
if ($titulo=="")
{
	$menu = "Home";
	$titulo = $opcoesMenu[$menu];
}

$insMenu = "";
foreach ($opcoesMenu as $opc => $itemMenu)
{
	$insMenu .= '<li'.($menu==$opc?' class="active"':'').'> <a href="index.php?menu='.$opc.'"> '.$opc.' </a> </li>';
}
 
require "view/layout.php";

