<?php

require_once "inc/conn.inc.php";
//$filter = " where title like '%:title%' ";

$id = isset($_GET['id_admin']) ? (int) $_GET['id_admin'] : null;




$stmt = $conn->prepare("SELECT id_admin, login, senha, nome, email, cpf, celular, data FROM tb_admin limit 10");
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

require_once "inc/header.php";
?>
<div class="wrapper">
    <?php
    require_once "inc/navbar.php";
    require_once "inc/sidebar.php";
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title pt-3">administradores cadastrados</h3>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastroModal">Cadastrar admin</button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">



                                <table id="example1" class="table table-borderedm table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Login</th>
                                            <th>Senha</th>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>CPF</th>
                                            <th>Celular</th>
                                            <th>Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!$results) {
                                            echo "<tr><td>Nenhum registro encontrado!</td></tr></tdoby></tbody></table>";
                                            exit();
                                        }
                                        ?>

                                        <?php

                                        foreach ($results as $row) {
                                            echo "<tr>";
                                            foreach ($row as $key => $value) {
                                                if ($key != "id") {
                                                    echo "<td>" . $value . "</td>";
                                                }
                                            }
                                            
                                        echo       '<td> <a href="form-edit.php?id_admin=' . $row['id_admin'] . '" class="badge badge-success"><i class="fa fa-edit"></i>Editar</a> </td>'; ?>
                                            <?php echo ' <td> <a href="delete.php?id_admin=' . $row['id_admin'] . '" class="badge badge-danger"><i class="fa fa-trash"></i> Apagar</a> </td>'; 
                                             
                                            echo  "</tr>" ;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php require_once("inc/footer.php") ?>

          <!--MODAL AQUI-->
    <div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Realize seu cadastro.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
               
            <!--FORMULARIO DE CADASTRO MODAL-->
            <form action="./create.php" method="POST"> 
                <div class="form-row mt-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Nome" name="nome">
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Login" name="login">
                    </div>
                    <div class="col">
                        <input type="password" class="form-control" placeholder="Senha" name="senha">
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Email" name="email">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Cpf" name="cpf">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" placeholder="Contato" name="celular">
                    </div>
                </div>

                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </div>
            </form> <!--end FORM-->
        </div>
    </div>
<!--FIM MODAL AQUI-->

<!-- Button EDITAR modal -->

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <!--FORMULARIO DE CADASTRO MODAL-->
         <form action="./form-edit.php" method="POST"> 
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
                </div>

                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </div>
            </form> <!--end FORM-->
      </div>
      
    </div>
  </div>
</div>