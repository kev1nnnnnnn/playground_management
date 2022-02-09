<?php

class Usuario {

    public function login($login, $senha) {
       
        global $conn;
      
        $stmt = $conn->prepare("SELECT * FROM tb_admin WHERE login = :login AND senha = :senha");
        
        $stmt->bindValue("login", $login);
        $stmt->bindValue("senha", md5($senha));
        $stmt->execute(); 

        if($stmt->rowCount() > 0) {

            $dados = $stmt->fetch();

            $_SESSION['idusuario'] = $dados['id_admin'];

            return true;
        } else {
            return false;
        }

    }
}





?>