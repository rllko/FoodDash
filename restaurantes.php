<?php
require_once './database/db_connection.php';

// if (isset($_GET["id"])) {
//      $restaurante = $_POST["input_pesquisar_restaurante"];
//  } else{
//     echo "please give an ID";
//  }

try {
    $q = "SELECT nome, preco, disponivel, foto, categoria FROM itens;";
    $statement = $pdo->prepare($q);
    $statement->execute();

    if ($statement) {
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($result);

    header('Content-Type: application/json');
    print_r($json);
    
    } else {
    echo "Erro ao executar a consulta.";
    }
  } catch (Exception $e) {
    echo "Erro na conexão à BD: " . $e->getMessage();
  }