<?php

    session_start();

    if(!isset($_SESSION['username'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHAT-ON (Login)</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
          crossorigin="anonymous">

    <link rel="stylesheet"
          href="CSS/style.css">
    <link rel="icon" href="image/logo.gif">
</head>
<body class="d-flex
            justify-content-center
            align-items-center
            vh-100">
    <div class="w-400 p-5 shadow rounded">
        <form method='post' 
              action='app/http/auth.php'>
            <div class="d-flex
                        justify-content-center
                        align-items-center
                        flex-column">

                <img src="image/logo.gif" 
                     class="w-50">
                <h3 class="display-4 fs-1 
                           text-center">
                           LOGIN</h3>
            </div>

            <?php
                if(isset($_GET['warn'])){
                        echo "<div class='alert alert-warning text-center' role='alert'>
                        ".htmlspecialchars($_GET['warn'])."
                        </div>";
                }
                if(isset($_GET['sucess'])){
                        echo "
                        <div class='alert alert-success text-center' role='alert'>
                                ".htmlspecialchars($_GET['sucess'])."
                        </div>";
                }
            ?>

            <div class="mb-3">
                <label  class="form-label">
                        User Name</label>
                <input  type="text" 
                        class="form-control" 
                        placeholder="@username"
                        name = "username"
                        required>
            </div>
            
            <div class="mb-3">
                <label  class="form-label">
                        Password</label>
                <input  type="password" 
                        class="form-control" 
                        placeholder="password"
                        name = "password"
                        required>
            </div>

            <button type="submit" 
                    class="btn btn-primary">
                    Login</button>

            <a href="signup.php" style="float: right">Sign up</a>
        </form>
    </div>
</body>
</html>

<?php
    }
    else{
        header("Location: home.php");
        exit;
    }
?>