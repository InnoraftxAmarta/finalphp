<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
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
$phno = $validvar = " ";
if(isset($_POST["submit"])){
   
   if(preg_match("/^[+]{1}[9]{1}[1]{1}[-]?[0-9]{10}+$/",$_POST["phno"]))
   {
       $phno = $_POST["phno"];
   }
   else 
   {
       $validvar ="The number is not valid";
   }}
?>
<div class="index4">
    <div class="namediv">


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
Phone Number:
<input type="text" name="phno" id="phno" value="<?php echo $phno; ?>" pattern="[+]{1}[9]{1}[1]{1}[0-9]{10}">
<input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<br>";
echo $phno;

echo $validvar;

?>

</div>

<div class="pagination">
  <a href="index4.php">&laquo;</a>
  <a href="index1.php">1</a>
  <a href="index2.php">2</a>
  <a href="index3.php">3</a>
  <a href="index4.php">4</a>
  <a href="index5.php">5</a>
  <a href="index6.php">6</a>
  <a href="info.php">7</a>
  <a href="index6.php">&raquo;</a>
</div>
</div>

</body>
</html>