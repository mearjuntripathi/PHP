<?php
    function getChats($id_1, $id_2, $connection){
         
        $query = "SELECT * FROM chats WHERE (from_id = '$id_1' AND to_id = '$id_2')
                                      OR    (from_id = '$id_2' AND to_id = '$id_1')
                                      ORDER BY chat_id ASC";

        if(mysqli_num_rows(mysqli_query($connection, $query)) > 0){
            $chats = mysqli_fetch_all(mysqli_query($connection, $query),MYSQLI_ASSOC);
            return $chats;
        }
        else{
            $chats = [];
            return $chats;
        }
    }
?>
