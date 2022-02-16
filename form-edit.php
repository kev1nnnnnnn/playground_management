<?php

require_once "inc/header.php";
require_once "inc/conn.inc.php";

$id_admin = isset($_GET['id_admin']) ? (int)$_GET['id_admin'] : null;

if(empty($id_admin)) {
    echo "ID não definido";
    exit;
}

$stmt = $conn->prepare("SELECT id_admin, login, senha, nome, email, cpf, celular, data FROM tb_admin limit 10");
$stmt->bindParam(':id_admin', $id_admin);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

require_once "inc/navbar.php";
require_once "inc/sidebar.php";



?>
 <?php

foreach ($results as $row) {
    echo "<tr>";
    foreach ($row as $key => $value) {
        if ($key != "id") {
          
        }
    }
    
}
?>



<div class="container">
<h1>Editar administrador</h1>
    <div class="row">
        <div class="col-md-6">
            <!--FORMULARIO DE CADASTRO MODAL-->
            <form action="./update.php" method="POST" id="myform"> 
                <div class="form-row mt-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Nome" name="nome" value="<?php echo $row['nome'];?>">
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Login" name="login" value="<?php echo $row['login'];?>">
                    </div>
                    <div class="col">
                        <input type="password" class="form-control" placeholder="Senha" name="senha" value="<?php echo $row['id_admin'];?>">
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $row['email'];?>">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Cpf" name="cpf" value="<?php echo $row['cpf'];?>">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" placeholder="Contato" name="celular" value="<?php echo $row['celular'];?>">
                    </div>
                    <div class="col col-md-12 mt-4">
                    <a type="button" href="admin.php" class="btn btn-dark" data-dismiss="modal">Voltar</a>
                    <button type="submit" class="btn btn-success">Salvar</button>
                    
                </div>
                <input type="hidden" class="form-control" name="id_admin" value="<?php echo $id_admin ?>">
                </div>
                    
                </div>
            </form> <!--end FORM-->
        </div>
    </div>



</div>
 

</body>
</html>

<script>

document.getElementById('myform').reset();


</script>