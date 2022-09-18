<?php
    function opened($id_1, $connection, $chats){
        foreach($chats as $chat){
            if($chat['opened'] == 0){
                $opened = 1;
                $chat_id = $chat['chat_id'];

                $query = "UPDATE chats SET 
                         opened = '$opened'
                         WHERE from_id = '$id_1'
                         AND   chat_id = '$chat_id'";

                mysqli_query($connection, $query);
            }
        }
    }
?>
