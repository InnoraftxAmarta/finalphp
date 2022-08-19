<!DOCTYPE HTML>
<html>
<head>
    <title>Login Page</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php

if($_GET['q']==1){
    echo "<script>location.href='index1.php'</script>";
}
elseif($_GET['q']==2){
    echo "<script>location.href='index2.php'</script>";

}
elseif($_GET['q']==3){
    echo "<script>location.href='index3.php'</script>";

}
elseif($_GET['q']==4){
    echo "<script>location.href='index4.php'</script>";

}
elseif($_GET['q']==5){
    echo "<script>location.href='index5.php'</script>";

}
elseif($_GET['q']==6){
    echo "<script>location.href='info.php'</script>";

}

?>


    <?php

    session_start();
    if($_SESSION['uname']!="admin" || $_SESSION['pwd']!="admin"){
        echo "<script>location.href='login.php'</script>";
    }
    

    ?>
    
    <?php
   
    $fname = $lname = $msgpr="";

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(empty($_POST["fname"])) {
            $fnameErr = "first Name is required";
        }
        else {
            $fname = test_input($_POST["fname"]);
            if(!preg_match("/^[a-zA-z]*$/",$fname))
            {
                $fnameErr = "Only letters and white space are allowed";
            }
        }
        if(empty($_POST["lname"])) {
            $lnameErr = "Last Name is required";
        }
        else {
            $lname = test_input($_POST["lname"]);
            if(!preg_match("/^[a-zA-Z-']*$/",$lname))
            {
                $lnameErr = "Only letters and white space are allowed";
            }
        }
        $msgpr = "Hello ".$fname." ".$lname ;
    }
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data; 
    }
?>

<?php
$fullname = $fname." ".$lname ;

?>
<div class="index1">
<div class="namediv">
<?php
echo "<h2> $msgpr<h2>";
?>
<!-- <p> <span class="error">* required field</span> </p> -->

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <label >First Name:</label>
 <input class="inputbox" type="text" name="fname" id="fname" onkeyup = "myfullname()" pattern="[A-Za-z]{1,}" required>

    <br> <br>
  <label >Last Name:</label>
 <input class="inputbox"  type="text" name="lname" id="lname" onkeyup = "myfullname()" pattern="[A-Za-z]{1,}" required>
  
  
    <br><br>
<label>Full Name:</label>
     <input class="inputbox"  type="text" name="fullname" id="fullname" disabled value="<?php echo $fullname; ?>" > <br> <br>
    


    <input class="submitbox submitindex" type="submit" name="submit" value="Submit">  
    <a href="logout.php"> <input type="button" class="submitbox submitindex" value="Logout"> </a>
</form>
</form>
<div class="pagination">
  <a href="info.php">&laquo;</a>
  <a href="index1.php">1</a>
  <a href="index2.php">2</a>
  <a href="index3.php">3</a>
  <a href="index4.php">4</a>
  <a href="index5.php">5</a>
  <a href="info.php">6</a>

  <a href="index2.php">&raquo;</a>
</div>
</div>


</div>
<script>
    function myfullname(){
    var firstname = document.getElementById("fname").value;
    var lastname = document.getElementById("lname").value;
    document.getElementById("fullname").value = firstname + " " +  lastname;
    }
    </script>




</body>
</html>