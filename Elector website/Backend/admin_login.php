<?php
session_start();

include "db_connection.php";

$user = $_POST['user_email'];
$password = $_POST['password'];





$sql = "select username,email from admin where username='$user' or email='$user'";
$q=mysqli_query($con,$sql);

if(mysqli_num_rows($q)>=1){
  $row=mysqli_fetch_assoc($q);
  echo $row['username'];
  
  if($row['username']==$user)
  {
    $_SESSION['user']="Username or email wrong";

    $sql1="select password from admin where password='$password'";
    $q1=mysqli_query($con,$sql1);
   if(mysqli_num_rows($q1)>=1){
      $row1=mysqli_fetch_assoc($q1);

      
      if($row1['password']==$password){
        $_SESSION['password']="password wrong";
        header("location: ../client/index.html");
      }
      else{
        header("location: ../admin/index.html");
      } 
   }
   else{
    header("location: ../admin/index.html");
 }
  }
  else{
     header("location: ../admin/index.html");
  }


}
else{
  header("location: ../admin/index.html");
}



?>