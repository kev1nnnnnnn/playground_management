<?php

require_once "inc/conn.inc.php";


//$filter = " where title like '%:title%' ";

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
   
    <div class="content-wrapper  pt-5 pr-4">

    <form class="form-controle">
        <div class="form-row">

            <div class="col col-md-3">
            <label for="">Criança</label>
            <select class="custom-select" id="">
                <option selected>Selecione</option>
                <option value="1">Hugo Jorge</option>
            </select>
            </div> <!--end col-->

            <div class="col col-md-3">
            <label for="">Responsavel</label>
            <select class="custom-select" id="">
                <option selected>Selecione</option>
                <option value="1">John Kevin</option>   
            </select>
            </div> <!--end col-->

            <div class="col col-md-3">
            <label for="">Contato</label>
                <input type="text" class="form-control " placeholder="Contato">
            </div> <!--end col-->

            <div class="col col-md-3">
         
            </div>

        </div> <!--end row-->
    </form>
    <div class="container">
        <div class="form-row mt-4">
            <div class="col-md-6">
                <div class="container">
                    <h2>Minutos:</h2>
                    <select id="minutos" name="minutos"></select>

                    <h2>Segundos:</h2>
                    <select id="segundos" name="segundos"></select>

                    <button class="btn btn-success" id="comecar">Começar!</button>
                    <button class="btn btn-danger" id="parar">Stop</button>

                </div>
            </div>

            <div class="col-md-12 mt-5">
            <audio id="sound" src="./assets/sound/alarm.mp3" style="display: none;"></audio>
                <div id="display">
                    <h3>00:00</h3>
                </div>
            </div>
        </div>
   

    
    
</div>
   
  
    </div>
    <!-- /.content-wrapper -->
    <?php require_once("inc/footer.php") ?>

         
        </div>
    </div>

<script>
var display = document.getElementById('display')
var minutos = document.getElementById('minutos')
var segundos = document.getElementById('segundos')
var comecar = document.getElementById('comecar')
var parar = document.getElementById('parar')

var minutoAtual;
var segundoAtual;

var interval


for(var i = 0; i<=60; i++){
    minutos.innerHTML+='<option value='+i+'>'+i+'</option>';
}

for(var i = 0; i<=60; i++){
    segundos.innerHTML+='<option value='+i+'>'+i+'</option>';
}



comecar.addEventListener('click',function(){
    minutoAtual = minutos.value
    segundoAtual = segundos.value
    display.childNodes[1].innerHTML = minutoAtual+": "+segundoAtual

    interval = setInterval(function(){
        segundoAtual--;

        if(segundoAtual<=0){
            if(minutoAtual>0){
                minutoAtual--
                segundoAtual=59
            }else{
                
                document.getElementById('sound').play();
                clearInterval(interval)
            }
        }

        display.childNodes[1].innerHTML = minutoAtual+": "+segundoAtual
    }, 1000)
})


parar.addEventListener('click',function(){
    clearInterval(interval)
})
</script>