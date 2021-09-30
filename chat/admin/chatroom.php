<?php 
header("Access-Control-Allow-Origin:*");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$_POST = json_decode(file_get_contents('php://input'), true);
        if(isset($_POST['data'])){
          require("db.php");
          $obj=new dbconnect();
        $return=  $obj->checkroom($_POST['data']);

          echo json_encode($return);
     
           
        }else{
            echo json_encode("parameter missing"); 
        }

}else{
    echo json_encode("opretaion failed ");
}


?>  