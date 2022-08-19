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

$data = $_POST['input'];
  if(strlen($data)>3){

    $data = str_replace('|',"\n",$data);

    $data = explode("\n", $data);

  }
?>
<div class="index3">
<div class="namediv">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">

Write Your Subject Name | Marks: <br>
<textarea name="input" rows="10" cols="50">
</textarea>
<input type="submit" class="submitbox submitindex3" name="submit" value="Submit">  
</form>


<?php

echo "<table>";
echo "<thead>";
echo "<tr>";
echo "<th>Subject </th>";
echo "<th>Marks </th>";
echo "</tr>";
echo "</thead>";
echo "<tbody class='tbody'>";
for($i=0 ; $i<count($data) ;$i++){
    
    if($i%2==0){
        
        $j=$i+1;
    
    echo "<tr>";
    
    echo "<td> $data[$i] </td>";
    echo "<td> $data[$j] </td>";
    echo"</tr>";
    

    }
    
}   
echo "</tbody>";
echo "</table>";  

?>

<div class="pagination">
  <a href="index2.php">&laquo;</a>
  <a href="index1.php">1</a>
  <a href="index2.php">2</a>
  <a href="index3.php">3</a>
  <a href="index4.php">4</a>
  <a href="index5.php">5</a>
  <a href="info.php">6</a>
  <a href="index4.php">&raquo;</a>
</div>
</div>
</div>
</body>
</html>