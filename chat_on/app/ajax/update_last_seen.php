<?php
 session_start();

 if(isset($_SESSION['username'])){
    include '../db.php';
    $id = $_SESSION['userid'];
    $query = "UPDATE users SET last_seen = NOW()
              WHERE userid='$id'";
    mysqli_query ($connection, $query);
 }else{
    header("Location: ../../index.php");
    exit;
 }
