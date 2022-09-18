<?php
    session_start();

    if(isset($_SESSION['username'])){

        if(isset($_POST['id_2'])) {

            include '../db.php'; 
            
            $id_1 = $_SESSION['userid'];

            $id_2 = $_POST['id_2'];

            $opened = 0;
            
            $query = "SELECT * FROM chats WHERE to_id = '$id_1'
                                          And   from_id = '$id_2'
                                          ORDER BY chat_id ASC";
                            
            if(mysqli_num_rows(mysqli_query($connection, $query)) >0){
                $chats = mysqli_fetch_all(mysqli_query($connection, $query),MYSQLI_ASSOC);

                foreach($chats as $chat){
                    if($chat['opened'] == 0){
                        $opened = 1;
                        $chat_id = $chat['chat_id'];
                         
                        $q = "UPDATE chats
                              SET opened = '$opened'
                              where chat_id = '$chat_id'";
                        mysqli_query($connection, $q);
                        ?>
                                <p class="ltext
                                    border rounded p-2 mb-1">
                                    <?=$chat['message']?>
                                    <small class="d-block"><?= $chat['created_at']?></small>
                                </p>
                        <?php
                    }
                }
            }

             
?>

<?php
        }   
    }else{
        header("Location: index.php");
        exit;
    }
?>
