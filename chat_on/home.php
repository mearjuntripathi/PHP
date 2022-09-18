<?php

    session_start();

    if(isset($_SESSION['username'])){

        include 'app/db.php';
        
        include 'app/helpers/user.php';

        include 'app/helpers/conversation.php';

        include 'app/helpers/timeAgo.php';


        $user = getUser($_SESSION['username'], $connection); 

        $conversation = getConversation($user['userid'], $connection);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHAT-ON (Home)</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
          crossorigin="anonymous">

    <link rel="stylesheet"
          href="CSS/style.css">
    <link rel="icon" href="image/logo.gif">
    <link rel="stylesheet" 
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="d-flex
             justify-content-center
             align-items-center
             vh-100">
    <div class="p-2 w-400
                rounded shadow">
        <div>
            <div class="d-flex
                        mb-3 p-3 bg-light
                        justify-content-between
                        align-items-center">
                <div class="d-flex
                            align-items-center">
                    <img src="uploads/<?=$user['pp']?>"
                         class="w-25 rounded-circle">
                    <h3 class="fs-xs m-2"><?=$user['name']?></h3>
                </div>
                <a href="logout.php"
                   class="btn btn-dark">Logout</a>
            </div>
            <div class="input-group mb-3">
                <input type="text"
                       placeholder="Search"
                       id="searchUser"
                       class="form-control">
                <button class="btn btn-primary"
                        id="searchBtn">
                    <i class="fa fa-search"></i>
                </button>
            </div>
            <ul id="chatlist"
                class= "list-group
                        mvh-50 
                        overflow-auto">
                <?php if(!empty($conversation)){ ?>
                    <?php 
                        foreach($conversation as $conversation){ 
                            ?>
                        <li class="list-group-item">
                            <a href="chat.php?user=<?=$conversation['username']?>"
                            class="d-flex
                                    justify-content-between
                                    align-items-center
                                    p-2
                                    mess_box">
                                <div class="d-flex
                                            align-items-center">
                                    <img src="uploads/<?=$conversation['pp']?>"
                                        class="w-10 rounded-circle">
                                    <h3 class="fs-xs m-2"><?= $conversation['name']?><br>
                                    </h3>
                                </div>
                                <?php
                                    if(last_seen($conversation['last_seen']) == "Active"){
                                ?>
                                    <div title="online">
                                        <div class="online "></div>
                                    </div>
                                <?php } ?>
                            </a>
                        </li>
                    <?php }?>   
                <?php } else{?>
                    <div class="alert alert-info 
                                text-center">
                        <i class="fa fa-comments 
                                  d-block 
                                  fs-big">
                        </i>
                        No message yet, Start the Conversation
                    </div>
                <?php }?>                
            </ul>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){

        $("#searchUser").on("input",function(){
            var searchUser = $(this).val();
            if(searchUser == "")
                return;
            $.post("app/ajax/search.php",{
                key: searchUser
            },
            function(data,status){
                $("#chatlist").html(data);
            });
        });

        $("#searchBtn").on("click",function(){
            var searchUser = $("#searchUser").val();
            if(searchUser == "")
                return;
            $.post("app/ajax/search.php",{
                key: searchUser
            },
            function(data,status){
                $("#chatlist").html(data);
            });
        });


        let lastSeenUpdate = function(){
            $.get("app/ajax/update_last_seen.php");
        }
        lastSeenUpdate();
        setInterval(lastSeenUpdate, 10000);
    });
</script>
</body>
</html>
<?php
    }
    else{
        header("Location: index.php");
        exit;
    }
?>