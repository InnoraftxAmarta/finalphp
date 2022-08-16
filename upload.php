<?php
require('../assignment5/fpdf184/fpdf.php');

$fnameErr = $lnameErr = "";
$fname = $lname = $img= $phno = $validvar= $email= $validemail=$data[] ="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    
// check firstname and last name
    
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

// for image
if(isset($_FILES['image'])){
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $extensions= array("jpeg","jpg","png","gif");
    
    move_uploaded_file($file_tmp,"image/".$file_name);
    $img="image/".$file_name;
}

// for phonenumber 
if(isset($_POST["submit"])){
   
    if(preg_match("/^[+]{1}[9]{1}[1]{1}[-]?[0-9]{10}+$/",$_POST["phno"]))
    {
        $phno = $_POST["phno"];
    }
    else 
    {
        $validvar ="The number is not valid";
    }}

 
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
            $validemail = $_POST['email'];
        }
        else {
            $validemail="The email is not valid";
        }


    } else {
        $validemail="The email is not valid";
    }





$data = $_POST['input'];
  if(strlen($data)>3){

    $data = str_replace('|',"\n",$data);

    $data = explode("\n", $data);

  }
    
}
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data; 
}


?>

<!-- input ends here -->

<!-- fpdf starts here  -->
<?php
$fullname = $fname." ".$lname ;

// echo "<img src='$img' width='50%' height='25%'>";
// echo " <br> ";
// echo "<h2>$fullname</h2>";
// echo "<h2>$phno</h2>";
// echo "<h3>$validvar</h3>"; 
// echo "<h3>$validemail</h3>";

// echo "$img";
// echo "<table>";
//         echo "<thead>";
//         echo "<tr>";
//         echo "<th>Subject </th>";
//         echo "<th>Marks </th>";
//         echo "</tr>";
//         echo "</thead>";
//         echo "<tbody class='tbody'>";
//         for($i=0 ; $i<count($data) ;$i++){
            
//             if($i%2==0){
                
//                 $j=$i+1;
            
//             echo "<tr>";
            
//             echo "<td> $data[$i] </td>";
//             echo "<td> $data[$j] </td>";
//             echo"</tr>";
            

//             }
            
//         }   
//         echo "</tbody>";
//         echo "</table>";  




if(isset($_POST["submit"])){

ob_start();
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Name:'.$fullname);
$pdf->Multicell(40,10,'');
$pdf->Cell(40,10,'Phone number :'.$phno);
$pdf->Multicell(40,10,'');
$pdf->Image($img,20,100,60,20,'JPG');
$pdf->Cell(40,10,'Email Id:'.$email);
$pdf->Multicell(40,10,'');
$pdf->Cell(40,10,'Subject',1); 
    $pdf->Cell(40,10,'Subject',1); 
    $pdf->Multicell(40,10,'');

for($i=0 ; $i<count($data) ;$i++){
            
    if($i%2==0){
        
        $j=$i+1;
    $pdf->Cell(40,10,$data[$i],1); 
    $pdf->Cell(40,10,$data[$j],1); 
    $pdf->Multicell(40,10,'');


    }
    
}   


$pdf->Output('F','save_pdf/contact.pdf');

$pdf->Output('D','contact.pdf');




ob_end_flush();
}
?>

