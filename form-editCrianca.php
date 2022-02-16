<?php

require_once "inc/header.php";
require_once "inc/conn.inc.php";

$id_crianca = isset($_GET['id_crianca']) ? (int)$_GET['id_crianca'] : null;

if(empty($id_crianca)) {
    echo "ID não definido";
    exit;
}

$stmt = $conn->prepare("SELECT * FROM tb_clientes limit 10");
$stmt->bindParam(':id_crianca', $id_crianca);
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
<h1>Editar clientes</h1>
    <div class="row">
        <div class="col-md-6">
            <!--FORMULARIO DE CADASTRO MODAL-->
            <form action="./updateCrianca.php" method="POST"> 
                <div class="form-row mt-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Nome" name="nome_crianca" value="<?php echo $row['nome_crianca'];?>">
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Contato" name="contato_crianca" value="<?php echo $row['contato_crianca'];?>">
                    </div>
                    <div class="col">
                        <input type="password" class="form-control" placeholder="Sexo" name="sexo_crianca" value="<?php echo $row['sexo_crianca'];?>">
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Idade" name="idade_crianca" value="<?php echo $row['idade_crianca'];?>">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Cpf" name="nome_responsavel" value="<?php echo $row['nome_responsavel'];?>">
                    </div>

                    <div class="col col-md-12 mt-4">
                    <a type="button" href="clientes.php" class="btn btn-dark" data-dismiss="modal">Voltar</a>
                    <button type="submit" class="btn btn-success">Salvar</button>
                    
                </div>
                <input type="hidden" class="form-control" name="id_crianca" value="<?php echo $id_crianca?>">
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