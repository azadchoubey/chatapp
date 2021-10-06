<?php

          header("Access-Control-Allow-Origin: *"); 
session_start();
if(isset($_SESSION['roomname'])){
  header('Location:chat.php');
}
require("db.php");
$obj=new dbconnect();
     if(isset($_POST['room']) && $_POST['from']){
        $return= $obj->checkroom($_POST['room']);
        $checkdata = json_decode($return, true);
          if($checkdata['code'] =="1"){
            $_SESSION['roomname']=$checkdata['msg'];
           $obj->create_table($checkdata['msg'],$_POST['from']);
                header('Location:chat.php');
          }else{
            echo " <script> 
            var room='".$_POST['room']."';
            var from='".$_POST['from']."';
            var  confirmation= confirm('". $checkdata['msg'] ."');
            if(confirmation==true){
              function createFormData(form, key, dataform) {
                if (dataform === Object(dataform) || Array.isArray(dataform)) {
                    for (var i in dataform) {
                        createFormData(form, key + '[' + i + ']', dataform[i]);
                    }
                } else {
                    form.append(key, dataform);
                }
            }
            var dataform={'room':room,'from':from};
        
            var  form=new FormData();
           
            createFormData(form, 'data', dataform);
            fetch('http://localhost/project/chat/admin/chatroom.php',{
              mode: 'no-cors',
              method: 'POST',
              credentials:'include',
              body:form,
              header: {
                  'Content-type': 'application/x-www-form-urlencoded',
              },
                }).then((response)=>{
                  return response.text();
              }).then((data)=>{
                document.body.innerHTML = data ;
              }).catch((error)=>{
                  console.log(error);
      
              })
             }else{
              window.location.href = 'index.php';    }
        </script>" ;
        

     
                    }
          }elseif(isset($_POST['msg']) && isset($_POST['ip']) && isset($_POST['room'])){
          require("db.php");
    
          $return= $obj->insert($_POST['msg'],$_POST['to'],$_POST['from'],$_SESSION['roomname']);
          
          echo $return;    

        }elseif(isset($_POST['data']['room']) && isset($_POST['data']['from'])){
          
          $result=$obj->insert_user($_POST['data']['room'],$_POST['data']['from']); 
          $checkdata = json_decode($result, true);
          echo $checkdata ;
          if($checkdata['code']==4){
            $_SESSION['roomname']=$_POST['data']['room'];

             header('Location:chat.php');
          }else{
            echo "not found"; 
          }
          
        }
        else{
            print_r($_POST);
        }




?>  