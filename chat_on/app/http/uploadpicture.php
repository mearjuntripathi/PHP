<?php

    session_start();

    if(!isset($_SESSION['username'])){

?>

<?php
    
    include '../db.php';
    if(isset($_POST['submit'])){
        $username = $_POST['submit'];
        $photo=$_FILES['profile']['name'];
        $tmp=$_FILES['profile']['tmp_name'];
        $location = "../../uploads/";
        
        move_uploaded_file($tmp,$location.$photo);
        $ext = ".".pathinfo($location.$photo, PATHINFO_EXTENSION);
        $con = rename($location.$photo,$location.$username.$ext);
        if($ext == ".")
            $pp = "user.png";
        else
            $pp = $username.$ext;
        
        $update="UPDATE users SET pp = '$pp' WHERE username = '$username'";
        if(mysqli_query($connection,$update)){
            $sucess = "@$username your account is sucessfully created";
            header("Location: ../../index.php?sucess=$sucess");
        }
    }
    else{
        $uname = $_GET['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHAT-ON (UPLOADING PICTURE)</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
          crossorigin="anonymous">

    <link rel="stylesheet"
          href="../../CSS/style.css">
    <link rel="icon" href="image/logo.gif">

</head>
    <body class="d-flex
                justify-content-center
                align-items-center
                vh-100">

        <div class="w-400 p-5 shadow rounded">
            <form method = 'post' 
                  action= ''
                  enctype= "multipart/form-data">

                <div class="d-flex
                            justify-content-center
                            align-items-center
                            flex-column">

                    <img src="../../image/logo.gif" 
                         class="w-75">
                    
                    <h3 class="display-4 fs-1 
                               text-center">
                        UPLOAD PICTURE
                    </h3>

                </div>
                <br>
                <p class="text-center">
                    <b>@<?=$uname ?></b> change your profile picture</p>
                <div class="text-center">
                
                        <img src="../../uploads/user.png" 
                                class="w-50 img-thumbnail" 
                                id="picture"
                                onclick="clickout();"
                                onmouseover="show();"
                                onmouseout="hide();"
                        />
                        
                        <br>
                        
                        <input type="file" 
                               name="profile" 
                               id="upload" 
                               onchange="showImage();" 
                               style="display: none;" 
                               accept="image/*"
                        />

                        <p  id="message" 
                            style="position: center;">
                            _
                        </p>
                        <br>
                </div>
                
                
                <button type="submit" 
                        class="btn btn-primary"
                        name = "submit"
                        value = "<?= $uname ?>">
                        UPLOAD
                </button>
                
                <a href="../../index.php?sucess=@<?=$uname?> your account is sucessfully created" 
                   style="float: right;" 
                   class="btn btn-danger">
                   SKIP
                </a>

            </form>
        </div>
    </body>
</html>

<script type="text/javascript">

    function show(){
        document.getElementById("message").innerHTML = "Click on image to upload image";
    }

    function hide(){
        document.getElementById("message").innerHTML = "_";
    }

    function clickout(){
        var temp = document.getElementById("upload");
        temp.click();
    }

    function showImage(input) {
        var temp = document.getElementById("upload");
        temp.click();
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("upload").files[0]);
        oFReader.onload = function (oFREvent) {
            document.getElementById("picture").src = oFREvent.target.result;
        };
    };
</script>

<?php } ?>


<?php
    }
    else{
        header("Location: ../../home.php");
        exit;
    }
?>
