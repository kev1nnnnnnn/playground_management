<?php

    session_start();

    global $conn;

    try{

        $conn = new PDO("mysql:host=localhost;dbname=db_park", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    } catch(PDOException $e) {
       
        $e->getMessage();
   
    }
   
    return $conn;
