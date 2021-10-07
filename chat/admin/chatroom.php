<?php

header("Access-Control-Allow-Origin: https://localhost/"); 
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
            $_SESSION['user']=$_POST['from'];
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
            fetch('https://localhost/project/chat/admin/chatroom.php',{
              mode: 'same-origin',
              method: 'POST',
              credentials:'include',
              body:form,
              header: {
                  'Content-type': 'application/x-www-form-urlencoded'        
              },
                }).then((response)=>{
                  return response.text();
              }).then((data)=>{
               document.write(data);
              }).catch((error)=>{
                  console.log(error);
      
              })
             }else{
              window.location.href = 'index.php';    }
        </script>" ;
        

     
                    }
          }elseif(isset($_POST['sendmsg']['room']) && isset($_POST['sendmsg']['msg']) && isset($_POST['sendmsg']['from']) && isset($_POST['sendmsg']['to'])){
          require("db.php");
    
          $return= $obj->insert($_POST['sendmsg']['room'],$_POST['sendmsg']['msg'],$_POST['sendmsg']['msg'],$_POST['sendmsg']['from'],$_POST['sendmsg']['to']);
          
          echo $return;    

        }elseif(isset($_POST['data']['room']) && isset($_POST['data']['from'])){
          
          $result=$obj->insert_user($_POST['data']['room'],$_POST['data']['from']); 
          $checkdata = json_decode($result, true);
       
          if($checkdata['code']==4){
            $_SESSION['roomname']=$_POST['data']['room'];
            $_SESSION['user']=$_POST['data']['from'];
             header('Location:chat.php');
          }else{
            echo "not found"; 
          }
          
        }
        else{
        
            print_r($_POST);
            //    header('Location:index.php');
        }




?>  