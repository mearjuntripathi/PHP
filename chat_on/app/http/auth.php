<?php

    session_start();

    include "../db.php";

    $username = $_POST['username'];

    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    if(mysqli_num_rows(mysqli_query($connection, $query))>0){
        $user = mysqli_fetch_assoc(mysqli_query($connection, $query));
        $_SESSION['username'] = $user['username'];
        $_SESSION['name'] = $name['name'];
        $_SESSION['userid'] = $user['userid'];

        header("Location: ../../home.php");
    }
    else{
        $warn = "Your @username and password is invalid!";
        header("Location: ../../index.php?warn=$warn"); 
    }

?>
