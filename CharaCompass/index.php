<?php
include_once('PHP/Conexao.php');
include_once('PHP/autoLoad.php');

//http://localhost/charaCompass/?controlador=mapa?acao=editar
$controlador = $_GET['controlador'] ?? 'Geral';
$acao = $_GET['acao'] ?? 'index';

$c = new {'Controlador'.$controlador}();
$c->{$acao}();
