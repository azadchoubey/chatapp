<?php session_start( );
require("db.php");
$obj=new dbconnect();
header("Access-Control-Allow-Origin: *"); 
     if(isset($_POST['room'])){
        
        $return= $obj->checkroom($_POST['room']);
        $checkdata = json_decode($return, true);
          if($checkdata['code'] =="1"){
            $_SESSION['roomname']=$checkdata['msg'];
                header('Location:chat.php');
          }else{
            echo ' <script> var  confirmation= confirm("'. $checkdata['msg'] .'");
            if(confirmation==true){
                window.location.href = "index.php";               
             }else{
              window.location.href = "index.php";    }
        </script>' ;
                    }
          }elseif(isset($_POST['msg']) && isset($_POST['ip']) && isset($_POST['room'])){
          require("db.php");
          $obj=new dbconnect();
          $return= $obj->insert($_POST['msg'],$_POST['ip'],$_POST['room']);
          
          echo $return;    

        }
        else{
            print_r($_POST);
        }




?>  