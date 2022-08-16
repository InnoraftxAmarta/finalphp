<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>



<?php

session_start();
if($_SESSION['uname']!="admin" || $_SESSION['pwd']!="admin"){
    echo "<script>location.href='login.php'</script>";
}


?>

<?php
include "upload.php";
?>
<div class="index1">
<div class="namediv">
<div class="fullcontainer">



    <form name="myForm" method="post" action="upload.php" enctype="multipart/form-data">  
  <label class="finalinput">First Name: </label>
    
    <input type="text" class="finalinput" name="fname" id="fname" onkeyup = "myfullname()" pattern="[A-Za-z]{1,}" require>

    <label class="finalinput">Last Name:</label>
  
     <input type="text" class="finalinput" name="lname" id="lname" onkeyup = "myfullname()" pattern="[A-Za-z]{1,}" require>
  
     <label class="finalinput">Full Name:</label>

 
    <input type="text" class="finalinput" name="fullname" id="fullname" disabled value="<?php echo $fullname; ?>" >
    
    <input type="file" class="finalinput" name="image" > 
    <label class="finalinput">Write Your Subject Name | Marks: </label>
    
<textarea name="input" class="finalinput" rows="10" cols="50">
</textarea>
<label class="finalinput">Phone number </label>
    
    <input type="text" name="phno" class="finalinput" id="phno" value="<?php echo $phno; ?>" pattern="[+]{1}[9]{1}[1]{1}[0-9]{10}">
    <label class="finalinput">Email Id</label>

    <input type="text" name="email" class="finalinput" id="email" value="<?php echo $email; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">

    
    
    <input type="submit" name="submit" value="Submit" class="submitbox">  
</form>

<a href="logout.php"> <input type="button" value="Logout" class="submitbox"> </a>
<!-- to store the input in a file -->
<br>
<script>
    function myfullname(){
    var firstname = document.getElementById("fname").value;
    var lastname = document.getElementById("lname").value;
    document.getElementById("fullname").value = firstname + " " +  lastname;
    }
    </script>


</div>

<div class="pagination">
  <a href="index5.php">&laquo;</a>
  <a href="index1.php">1</a>
  <a href="index2.php">2</a>
  <a href="index3.php">3</a>
  <a href="index4.php">4</a>
  <a href="index5.php">5</a>
  
  <a href="info.php">6</a>
  <a href="index1.php">&raquo;</a>
</div>
</div>
</div>
</body>
</html>