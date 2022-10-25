<?php
           session_start();
           $user=$_SESSION['user'];
           if(!isset($_SESSION['user'])){
             header("Location: register.php");
           }
?>