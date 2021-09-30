<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$_POST = json_decode(file_get_contents('php://input'), true);
    print_r($_POST) ;

}else{
    echo json_encode("opretaion failed ");
}


?>  