<?php
session_start();


$uname="admin";
$pwd="admin";



if(($_SESSION['uname'] == $uname)){

    
    echo "<script>location.href='index1.php'</script>";
}
else {
    if($_POST['uname']==$uname && $_POST['pwd']==$pwd){

        $_SESSION['uname']=$uname;
        $_SESSION['pwd']=$pwd;

        echo "<script>location.href='check.php'</script>";
    }
    else {
       
        echo "<script>alert('username or password incorrect!')</script>";

        echo "<script>location.href='login.php'</script>";
        
    }
}

?>