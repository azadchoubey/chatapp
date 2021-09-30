<?php 
class dbconnect{
     public function checkroom($value){

        try{
            $con= new PDO("mysql:host=localhost;dbname=chat",'root','');
            $query="SELECT * FROM chatroom WHERE roomname='$value'";
            $sql= $con->prepare($query);
            $sql->execute();
            if($sql->rowCount()>0){
                    return json_encode(['code'=>0,'msg'=>"this roomname already taken please use another roomname"]);
            }else{
                $insert=$con->prepare("INSERT INTO chatroom (id,roomname1,datetime,status) VALUES (null,'$value', current_timestamp,1)");
                $insert->execute();
                if($insert->rowCount()>0){
                   return json_encode(['code'=>1,'msg'=>"lets chat"]);
                }else{
                    return json_encode(['code'=>2,'msg'=>"try again"]);
                }
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
     }   

}
    // public function insert($table,$columns,$where=null){

    // }
?>