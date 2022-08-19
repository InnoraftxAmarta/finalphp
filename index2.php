<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
$img = "";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
if(isset($_FILES['image']))
{
  $file_name = $_FILES['image']['name'];
  $file_size =$_FILES['image']['size'];
  $file_tmp =$_FILES['image']['tmp_name'];
  $file_type=$_FILES['image']['type'];
  $extensions= array("jpeg","jpg","png","gif");
  
  move_uploaded_file($file_tmp,"photo/".$file_name);
  $img="photo/".$file_name;
}
  
}
?>
<div class="index1">
<div class="namediv">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
<label>
Select file to upload :
</label>
  

  <input type="file" class="imgbox"  name="image">

  <input type="submit" class="submitbox submitindex" value="Submit" name="submit">
</form>

<?php
echo "<br>";
echo "<br>";
echo "<img class='imgbox' src='$img' width='400' height='250'><br>"; 
?>

<div class="pagination">
  <a href="index1.php">&laquo;</a>
  <a href="index1.php">1</a>
  <a href="index2.php">2</a>
  <a href="index3.php">3</a>
  <a href="index4.php">4</a>
  <a href="index5.php">5</a>
  <a href="info.php">6</a>
  <a href="index3.php">&raquo;</a>
  </div>
</div>
</div>

</body>
</html>