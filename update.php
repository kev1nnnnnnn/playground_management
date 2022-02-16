<?php
//$conn não é mais uma variável, agora é um objeto.
//$conn = new PDO("mysql:host=localhost;dbname=db_park", "root", "");
require_once "inc/conn.inc.php";


//$id = addslashes($_GET["id"]);
$stmt = $conn->prepare("UPDATE tb_admin SET login=:login, senha=:senha,nome=:nome, email=:email, cpf=:cpf, celular=:celular WHERE id_admin=:id_admin");



$login = $_POST['login'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$celular = $_POST['celular'];
$id_admin = $_POST['id_admin'];

$stmt->bindParam(":login", $login);
$stmt->bindParam(":senha", $senha);
$stmt->bindParam(":nome", $nome);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":cpf", $cpf);
$stmt->bindParam(":celular", $celular);
$stmt->bindParam(":id_admin", $id_admin, PDO::PARAM_INT);

if ($stmt->execute()) {
    echo "Dados alterados com sucesso!";
    header('Location: admin.php');
} else {
    echo "Erro ao alterar";
}
