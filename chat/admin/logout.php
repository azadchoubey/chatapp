<?php
session_start();
$roomname=$_SESSION['roomname'];
try{
        $con= new PDO("mysql:host=localhost;dbname=chat",'root','');
        $sql=$con->prepare("UPDATE chatroom SET status=0 WHERE roomname = '$roomname'");
        $sql->execute();
       
    }catch(PDOException $e){
        echo $e->getMessage();
    }
        unset($_SESSION['roomname']);
        unset($_SESSION['user']);
        header("Location: https://localhost/project/chat/admin");
     
?>