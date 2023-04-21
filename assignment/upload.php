<?php
    if(isset($_POST['submit'])){
        include 'db.php';

        $name = $_POST['name'];
        $number = $_POST['number'];
        $address = $_POST['address'];

        $query = "INSERT INTO users SET name = '$name',
                                      mobile = '$number',
                                     address = '$address',
                                          id = UUID()";
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>data submit</title>
</head>
<body>
<div class="header">
        <img src="https://workctrl.in/wp-content/uploads/2023/02/WorkCtrl-Logo.png" 
             alt="WorkCtrl-Logo" 
             class="logo">
        <p id="tag">PHP DEVELOPMENT INTERN ASSIGNMENT</p>
    </div>

<?php
    // if(mysqli_query($con,$query)){
?>
    <div class="warning">
        <p>Data is inserted</p>
    </div>
<?php
// }
// else{
//     header("Location: index.html");
// }
?>
<?php
    $q = "SELECT id FROM users ORDER BY id DESC LIMIT 1";
    $id=mysqli_fetch_assoc(mysqli_query($con,$q));
    $uuid = $id['id'];
?> 
    <div class="userdata">
        <div id="pdf">
            <h1><?=$name?></h1>
            <p class="title"><u>uuid</u>- <?=$uuid?></p>
            <p><u>Address</u> - <?=$address?></p>
            <p><u>mobile</u> - <?=$number?></p>
        </div>
        <button id='genrate' >genrate pdf</button> <br>
        <a href="index.html"> return to front page</a>
    </div>
</body>
</html>

<script src= "https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"> </script>
<script>
    //To add html2pdf into to project

//To create a pdf

    var btn = document.getElementById("genrate");
      var createpdf = document.getElementById("pdf");
      var opt = {
         margin: 1,
         filename: '<?=$name?>.pdf',
         html2canvas: {
            scale: 2
         },
         jsPDF: {
            unit: 'in',
            format: 'letter',
            orientation: 'portrait'
         }
      };
      btn.addEventListener("click", function() {
         html2pdf().set(opt).from(createpdf).save();
      });
</script>

<?php
    }else{
        header("Location: index.html");
    }
?>