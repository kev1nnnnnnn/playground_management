<?php


require_once "inc/conn.inc.php";
//$filter = " where title like '%:title%' ";

$stmt = $conn->prepare("SELECT id_responsavel, nome_responsavel, cpf_responsavel, rg_responsavel, endereco_responsavel, data FROM tb_responsavel limit 10");
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
                                <h3 class="card-title pt-3">Responsável cadastrados</h3>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#responsavelModal">Cadastrar responsável</button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">



                                <table id="example1" class="table table-borderedm table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>CPF</th>
                                            <th>RG</th>
                                            <th>endereco</th>
                                            <th>Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!$results) {
                                            echo "<tr><td colspan='5'>Nenhum registro encontrado!</td></tr></tdoby></tbody></table>";
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
                                            echo "<td> <a href='#' class='badge badge-success'><i class='fa fa-edit'></i>Editar</a> </td>"; ?>
                                            <?php echo ' <td> <a href="delete.php?id_responsavel=' . $row['id_responsavel'] . '" class="badge badge-danger"><i class="fa fa-trash"></i> Apagar</a> </td>'; 
                                            echo "</tr>";
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
    <div class="modal fade" id="responsavelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input type="text" class="form-control" placeholder="Nome" name="nome_responsavel">
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="col">
                        <input type="number" class="form-control" placeholder="CPF" name="cpf_responsavel">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" placeholder="RG" name="rg_responsavel">
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Endereço" name="endereco_responsavel">
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