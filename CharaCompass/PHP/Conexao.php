<?php

function conexao(){
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=bigoflix;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $pdo;
  } catch(PDOException $e) {
    echo 'Houve um erro na conexão: ' . $e->getMessage();
  }

}
?>