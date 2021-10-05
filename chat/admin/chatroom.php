<?php session_start( );
require("db.php");
$obj=new dbconnect();
header("Access-Control-Allow-Origin: *"); 
     if(isset($_POST['room']) && $_POST['from']){
        $return= $obj->checkroom($_POST['room']);
        $checkdata = json_decode($return, true);
        print_r($checkdata);

          if($checkdata['code'] =="1"){
            $_SESSION['roomname']=$checkdata['msg'];
           $obj->create_table($checkdata['msg'],$_POST['from']);
                header('Location:chat.php');
          }else{
            echo ' <script> var  confirmation= confirm("'. $checkdata['msg'] .'");
            if(confirmation==true){
                window.location.href = "chat.php";';   
                $_SESSION['roomname']=$_POST['room'];
            echo ' }else{
              window.location.href = "index.php";    }
        </script>' ;
                    }
          }elseif(isset($_POST['msg']) && isset($_POST['ip']) && isset($_POST['room'])){
          require("db.php");
    
          $return= $obj->insert($_POST['msg'],$_POST['to'],$_POST['from'],$_SESSION['roomname']);
          
          echo $return;    

        }
        else{
            print_r($_POST);
        }




?>  