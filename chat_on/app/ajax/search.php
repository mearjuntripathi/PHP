<?php
session_start();

if(isset($_SESSION['username'])){
    if(isset($_POST['key'])){
        include "../db.php";
        $key = "%{$_POST['key']}%";
        $query = "SELECT * FROM users WHERE username LIKE '$key' OR name LIKE '$key'";
        if(mysqli_num_rows(mysqli_query($connection, $query)) > 0){
            $users = mysqli_fetch_all(mysqli_query($connection, $query),MYSQLI_ASSOC);
            foreach($users as $user){
                if($user['userid'] == $_SESSION['userid'])
                    continue;
        ?>
            <li class="list-group-item">
                            <a href="chat.php?user=<?=$user['username']?>"
                            class="d-flex
                                    justify-content-between
                                    align-items-center
                                    p-2
                                    mess_box">
                                <div class="d-flex
                                            align-items-center">
                                    <img src="uploads/<?=$user['pp']?>"
                                        class="w-10 rounded-circle">
                                    <h3 class="fs-xs m-2"><?= $user['name'] ?></h3>
                                </div>
                            </a>
                        </li>
        <?php
        }}else{ ?>
            <div class="alert alert-info
                        text-center">
                <i class="fa fa-user-times
                          d-block
                          fs-big"></i>
                The user "<?= htmlspecialchars($_POST['key'])?>" is not found.
            </div>
        <?php 
    }
}}else{
    header("Location: ../../index.php");
    exit;
 }
?>
