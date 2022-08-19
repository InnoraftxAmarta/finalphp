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

$validemail = "";

if(isset($_POST["submit"])){

 
    if(preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$_POST["email"])){
       
        // start of email validation api
        $email=$_POST["email"];

        // echo $email;

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.apilayer.com/email_verification/$email",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: text/plain",
            "apikey: 0raMZqkBOpskhiaXkl61IiWtYcHLQZ2m"
        ),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET"
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response, true);

        // echo $response;

        // $response = json_decode($response);
        // var_dump($response);

        if($response["can_connect_smtp"] == true)
        {
            $validemail = $_POST['email']." is Valid";
        }
        else {
            $validemail="The email is not valid";
        }


    } else {
        $validemail="The email is not valid";
    }


}

?>
<div class="index1">
<div class="namediv">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">

Email Id
    <input type="text" name="email" id="email" value="<?php echo $email; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
    <input type="submit" name="submit" value="Submit">  

</form>


<div class="pagination">
  <a href="index5.php">&laquo;</a>
  <a href="index1.php">1</a>
  <a href="index2.php">2</a>
  <a href="index3.php">3</a>
  <a href="index4.php">4</a>
  <a href="index5.php">5</a>
  <a href="info.php">6</a>
  <a href="info.php">&raquo;</a>
</div>
</div>
</div>
<?php
echo "<br>";
echo "<br>";
echo $validemail;
 
?>
</body>
</html>