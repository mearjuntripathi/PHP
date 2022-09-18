<?php

    function getConversation($user_id, $connection){
        $query1 = "SELECT * FROM conversation WHERE user_1 = '$user_id' 
                                               OR user_2 = '$user_id' 
                                        ORDER BY conversation_id DESC";
        if(mysqli_num_rows(mysqli_query($connection, $query1)) > 0){
            $user_data = [];
            $conversation = mysqli_fetch_all(mysqli_query($connection, $query1),MYSQLI_ASSOC);
            foreach($conversation as $conversation){
                if($conversation['user_1'] == $user_id){
                    $cu2 = $conversation['user_2'];
                    $query2 = "SELECT  name, username, pp, last_seen
                                      FROM users WHERE userid='$cu2'";
                }else{
                    $cu1 = $conversation['user_1'];
                    $query2 = "SELECT name, username, pp, last_seen
                                      FROM users WHERE userid='$cu1'";
                }
                
                $allconversation = mysqli_fetch_all(mysqli_query($connection, $query2),MYSQLI_ASSOC);
                array_push($user_data, $allconversation[0]);
            }
            return $user_data;
            
        }else{
            $conversation = [];
            return $conversation;
        }
    }

?>
