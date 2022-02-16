<?php

//$conn não é mais uma variável, agora é um objeto.
//$conn = new PDO("mysql:host=localhost;dbname=db_park", "root", "");
require_once "inc/conn.inc.php";

$stmt = $conn->prepare("UPDATE tb_clientes SET nome_crianca=:nome_crianca, contato_crianca=:contato_crianca, sexo_crianca=:sexo_crianca, idade_crianca=:idade_crianca, nome_responsavel=:nome_responsavel) WHERE id_crianca=:id_crianca");

$nome_crianca = $_POST['nome_crianca'];
$contato_crianca = $_POST['contato_crianca'];
$sexo_crianca = $_POST['sexo_crianca'];
$idade_crianca = $_POST['idade_crianca'];
$nome_responsavel = $_POST['nome_responsavel'];
$id_crianca = $_POST['id_crianca'];

$stmt->bindParam(':nome_crianca', $nome_crianca);
$stmt->bindParam(':contato_crianca', $contato_crianca);
$stmt->bindParam(':sexo_crianca', $sexo_crianca);
$stmt->bindParam(':idade_crianca', $idade_crianca);
$stmt->bindParam(':nome_responsavel', $nome_responsavel);
$stmt->bindParam(":id_crianca", $id_crianca, PDO::PARAM_INT);


if($stmt->execute()) {
    echo "Dados alterados com sucesso!";
    header('Location: clientes.php');
    exit;
} else {
    echo "Erro ao alterar";
}



?>