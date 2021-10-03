<?php
session_start();
        unset($_SESSION['roomname']);
        header("Location: https://localhost/pro/chat/admin");

?>