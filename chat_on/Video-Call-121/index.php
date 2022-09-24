<?php

    session_start();

    if(isset($_SESSION['username'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHAT-ON (Vido-Call-121)</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
          crossorigin="anonymous">
    <link rel="icon" href="../image/logo.gif">
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <link rel="stylesheet" 
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://cdn.scaledrone.com/scaledrone.min.js'></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">

</head>
<body>
  
<div>
  <center>
  <video id="localVideo" autoplay></video>
    </center>
</div>
<div>
  <center>
  <video id="remoteVideo" autoplay></video>
    </center>
  <div>
    
    <div class="footer">
    <center>
    <button onclick="history.back()" class="btn btn-dark w-25"><i class="fa fa-phone" id="call" style="font-size:30px;color:red" ></i></button>
    </center>
    <br><br>
  </div>
  <script src="script.js"></script>
</body>
</html>

<?php
    }
    else{
        header("Location: ../home.php");
        exit;
    }
?>