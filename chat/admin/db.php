<?php 
class dbconnect{
     public function checkroom($value){

        try{
            $con= new PDO("mysql:host=localhost;dbname=chat",'root','');
            $query="SELECT * FROM chatroom WHERE roomname='$value'";
            $sql= $con->prepare($query);
            $sql->execute();
            if($sql->rowCount()>0){
                    return json_encode(['code'=>0,'msg'=>"this roomname already in use you want to continue with room ?"]);
            }else{
                $insert=$con->prepare("INSERT INTO chatroom (id,roomname,datetime,status) VALUES (null,'$value', current_timestamp,1)");
                $insert->execute();
                if($insert->rowCount()>0){
                  
                   return json_encode(['code'=>1,'msg'=>$value]);
                }else{
                    return json_encode(['code'=>2,'msg'=>"try again"]);
                }
            }
        }catch(PDOException $e){
            return json_encode( $e->getMessage());
        }
        $con=null;
     }   
     public function insert($msg,$room,$ip){
            try{
                $con= new PDO("mysql:host=localhost;dbname=chat",'root','');
                $sql=$con->prepare("INSERT INTO messages (Sno,msg,room,ip,datetime) VALUES (null,'$msg','$room','$ip',current_timestamp)");
                $sql->execute();
                if($sql->rowCount()>0){
                    $result=$sql->fetchAll(PDO::FETCH_OBJ);
                    return json_encode($result);
                }else{
                    return json_encode(['code'=>2,'msg'=>"try again"]);
                }
            }catch(PDOException $e){

            }
    }
    public function create_table($roomname){
        try{
            $con= new PDO("mysql:host=localhost;dbname=chat",'root','');
            $sql=$con->prepare("CREATE TABLE $roomname  ( `Sno` INT NOT NULL AUTO_INCREMENT , `msg` TEXT NOT NULL , `from` VARCHAR(30) NOT NULL , `to` VARCHAR(30) NOT NULL , `time` TIMESTAMP NOT NULL , PRIMARY KEY (`Sno`)) ENGINE = InnoDB;)");
            $sql->execute();
            if($sql->rowCount()>0){
                $result=$sql->fetchAll(PDO::FETCH_OBJ);
                return json_encode($result);
            }else{
                return json_encode(['code'=>2,'msg'=>"try again"]);
            }
        }catch(PDOException $e){
            return json_encode($e->getMessage());
        }
    }





}
    
?>