<?php
session_start();
if($_SESSION['isAdmin']){
    header('Location: ./html');
  }
  else{
    header('location: ../portal?p=panel');
  }
?>