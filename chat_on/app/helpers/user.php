<?php

    function getUser($username, $connection){
        $query = "SELECT * FROM users WHERE username = '$username'";
        if(mysqli_num_rows(mysqli_query($connection, $query)) === 1){
            $user = mysqli_fetch_assoc(mysqli_query($connection, $query));
            return $user;
        }
        else{
            $user = [];
            return $user;
        }
    }
?>
