<?php

    session_start();
    if(isset($_SESSION['username'])){
        
        if(isset($_POST['message']) && isset($_POST['to_id'])) {
            
            include '../db.php';
            
            $message = $_POST['message'];
            
            $to_id = $_POST['to_id'];
            
            $from_id = $_SESSION['userid'];
            
            define('TIMEZONE', 'Asia/Kolkata');
            date_default_timezone_set(TIMEZONE);
            
            $time = date("h:i a");
            $query = "INSERT INTO chats SET from_id = '$from_id',
                                          to_id   = '$to_id',
                                          message = '$message'";
            if(mysqli_query($connection, $query)){
                $sql = "SELECT * FROM conversation WHERE (user_1 = '$from_id' AND user_2 = '$to_id')
                                                   OR    (user_2 = '$from_id' AND user_1 = '$to_id')";
                if(mysqli_num_rows(mysqli_query($connection, $sql)) == 0){
                    $sql1 = "INSERT INTO conversation SET user_1 = '$from_id',
                                                          user_2 = '$to_id'";
                    mysqli_query($connection, $sql1);
                }
                
?>
                <p class="rtext align-self-end
                        border rounded p-2 mb-1">
                <?=$message?>
                <small class="d-block"><?=$time?></small>
                </p>
<?php
            }       
        }
    }else{
        header("Location: index.php");
        exit;
    }
?>
