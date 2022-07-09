<?php
    
if (isset($_POST))
{

$AN=$_POST["ApNo"];
$Fn=$_POST["Fname"];
$Ln=$_POST["LName"];
$Photo=$_POST["Photo"];
$Dat=date("Y-m-d");
$EM=$_POST["Email"];
$Gen=$_POST["Gender"];
$Ph=$_POST["Phone"];
$Pass=$_POST["Pass"];
$DOB=$_POST["Dat"];

$conn=mysqli_connect("localhost","root","","techciti");
if(!$conn)
{
    die("Connection Unsucessfull".mysqli_connet_error());
}
// else{
//     echo "success"; 
// }
$sql="INSERT INTO techciti.registration(ApartmentNo,FName,LName,Email,DateOfBirth,Photo,Gender,Phone,Pass,Date) VALUES('$AN','$Fn','$Ln','$EM','$Dat','$Photo','$Gen',$Ph,'$Pass','$Dat') ";
if(mysqli_query($conn,$sql))
{
    // echo "<h3>Registration Done Successfully</h3>";
    header("Location:http://localhost/Surya/Login.html");
}
else{
    echo "<h3> Email and Apartment No are already registered</h3>";
    echo "<a href='Registration.html'>Click here to redirect</a>";
}
}
else{
    echo "Something went wrong...!";
}

?>