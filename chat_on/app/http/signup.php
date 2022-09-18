<?php
    
    include "../db.php";

    $name = $_POST['name'];

    $username = $_POST['username'];

    $password = $_POST['password'];

    $quuery = "SELECT * FROM users where username = '$username'";

    $result = mysqli_query($connection, $quuery);

    $row = mysqli_num_rows($result);

    if($row > 0){
        $warn = "@$username is alrready exist!";
        header("Location: ../../signup.php?warn=$warn");
    }
    else{
        $query = "INSERT INTO users SET name = '$name',
                                    username = '$username',
                                    password = '$password'";

        if(mysqli_query($connection, $query)){
            header("Location: uploadpicture.php?username=$username");
        }else{
            $warn = "Some error occured!";
            header("Location: ../../signup.php?warn=$warn");
        }
    }


?>
