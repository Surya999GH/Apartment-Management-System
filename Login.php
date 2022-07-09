<html>
    <head>
        <title>Login</title>
        <style>
            input{
                border-radius: 20px;
            }
            button{
                border-radius: 15px;
            }
            td{
                height: 20px;
                width: 20px;
            }
            
        </style>
        
    </head>
    <body style="background-image: url(https://cf.bstatic.com/xdata/images/hotel/max1280x900/285711651.jpg?k=f69009f1f11911cfde29f36b68d634029b83d92402abf027af3fcdbc7a9aeb8a&o=&hp=1); background-repeat: no-repeat;background-size: cover;"><center>
        <header>
        <div style="width: 100%; height: 150px;background-color: rgb(70, 209, 35);"><h1 style="font-size: 80px;float: left;margin-left: 40px;">Surya SunCity</h1></div>
        </header>
        <marquee style="color: red;font-size: x-large;">Welcome to Surya SunCity</marquee>
        <form method="post" action="Login.php"><fieldset style="width:500px ;height: 300px;background-color: rgb(23, 243, 232);opacity: 75%;">
        <legend style="border-radius: 20px;float: left; background-color: rgb(23, 243, 232);"><h1>Login/SignIn</h1></legend>
        <table align="center" cellspacing="20" cellpadding="5">
            
            <tr>
                <th style="text-align: left;">Email</th>
                <th>:</th>
                <td><input type="email" name="Email" id="Em" required></td>
            </tr>
            <tr>
                <th style="text-align: left;">Password</th>
                <th>:</th>
                <td><input type="password" name="Pass" id="PW" required></td>
            </tr>
            <tr>
                <th><a href="UserHome.html"><button type="submit"  style="background-color:blue;color: rgb(25, 216, 206);">Login</button></a></th>
                <td></td>
                <th><button type="reset" style="background-color: red;color: white;">Cancel</button></th>
            </tr>
        </table>
        <br>
        <p>If not have an account <a href="Registration.html">SignUp/Register</a></p>
        </fieldset>
        </form>
        

<?php
if(isset($_POST))
{
    $Em=$_POST["Email"];
    $Pass=$_POST["Pass"];
    $conn=mysqli_connect("localhost","root","","techciti");
    if(!$conn)
    {
        die("Something Went Wrong...!".mysqli_connet_error());
    }
    $sql="select Pass,ApartmentNo from techciti.registration where Email='$Em'";
    $res=mysqli_query($conn,$sql);
    if($row=mysqli_fetch_assoc($res))
    {
    $sto_pass=$row["Pass"];
    $ApNo=$row["ApartmentNo"];
    if($sto_pass==$Pass)
    {
        session_start();
        $_SESSION["ApartNo"]=$ApNo;
        $_SESSION["Email"]=$Em;
        $_SESSION["Password"]=$sto_pass;
        print_r($_SESSION);
        if($Em=="admin@gmail.com")
        {
            header("Location:http://localhost/Surya/AdminHome.php");
        }
        else{
            header("Location:http://localhost/Surya/UserHome.php");
        }

    }
    else{
        echo "<h2 style='color:red;'>Incorrect Password</h2>";
    }
    }
    else{
        echo "<h3 style='color:red;'>Email not Registered</h3>";
    }
}
?>
</center>
    </body>
</html>