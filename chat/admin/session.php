<?php 

class session{
    public static function set_session($key,$value){
            $_SESSION[$key]=$value;
    }
    public static function get_session($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key]; 
        }else{
            return false;
        }   
    }
}
    
?>