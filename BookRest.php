<?php
session_start();
if(isset($_SESSION)){
    ?>
<html>
    <head>
        <title>Restaurant Booking</title>
    
    <link type="text/css" rel="style.css">
    <style>
        td{
            font-size: large;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        }
        button{
            height: 40px;
            width: 90px;
            font-size: larger;
        }
        
    </style>
    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(function(){
            $('#headbar').load('Try.html');
        });
    </script>
    <script>
        function OTP()
        {
            var o=0;
            if(o=prompt("Enter OTP sent to your mobile number","")){
                var Status="Success";
                
            }
            else{
                var Status="Failed";
            }
            document.getElementById("Otp").value=o;
            document.getElementById("Status").value=Status;
        }
        function Amount()
        {
            var n=document.getElementById("No").value;
            var c=n*250;
            document.getElementById("BCharge").value=c;
        }
    </script>
</head>
<body style="background-image: url(Bg.jpg);background-attachment: fixed;background-size: cover;">
  <div id="headbar"></div>
  <div style="float: left;height: auto;width: 100%;background-color: rgb(28, 44, 44);color: brown;">
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="http://localhost/Surya/WaterBill.php">Water Bill</a>
      <a href="http://localhost/Surya/CurrentBill.php">Electricity Bill</a>
      <a href="http://localhost/Surya/Taxi.php">Book Taxi</a>
      <a href="http://localhost/Surya/BookRest.php">Book Restaurant</a>
      <a href="http://localhost/Surya/MyPayments.html">MyPayments</a>
    </div>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Book Restaurant</span>
    
  </div>
  <script src="script.js"></script>
  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }
    
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
    </script>
    <div style="width: 100%;">
      <div style="float: right;width: 15%;height: 100%; text-align: center;background-color: aqua;">
          <h1 style="writing-mode: vertical-rl; padding: 50px;height: 85%;">Restaurant Booking</h1>
      </div>
      <div style="float: left;width: 85%;">
        <form method="post" action="BookRest.php">
            <fieldset style="height: auto;width: 30%;margin: 0 auto;text-align: center; padding: 150px; background-color: blueviolet;opacity: 90%;">
            <?php
      if(!$_POST)
      {
        ?>     
            <table cellspacing="15px">
                    <tr>
                        <td>Apartment No</td>
                        <td>:</td>
                        <td><input type="text" name="ApNo" required placeholder="Apartment No"></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td><input type="text" name="Nam" required placeholder="Your Name"></td>
                    </tr>
                    <tr>
                        <td>Mobile Number</td>
                        <td>:</td>
                        <td><input type="number" name="PhNo" required placeholder="Mobile No"></td>
                    </tr>
                    <tr>
                        <td>No of Tables</td>
                        <td>:</td>
                        <td><input type="number" name="No" id="No" onchange="Amount()" required placeholder="No of tables"></td>
                    </tr>
                    
                    <tr>
                        <td>Booking Charges</td>
                        <td>:</td>
                        <td><input type="number" name="Amt" value="" id="BCharge" readonly placeholder="Booking Charges" ><br></td>
                    </tr>
                    <tr>
                        <th colspan="3"><p>Rs:250 Per Table <br>Only Evening Bookings </p></th>
                    </tr>
                    <tr>
                        <td>Booking Date</td>
                        <td>:</td>
                        <td><input type="date" name="Dat" required placeholder="Booking date"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><input type="password" name="Pass" required placeholder="Password"></td>
                    </tr>
                    <tr>
                        <td>Card No</td>
                        <td>:</td>
                        <td><input type="number" name="CDNo" required placeholder="Credit/Debit Card No"></td>
                    </tr>
                    <tr>
                        <td>Payment Mobile No</td>
                        <td>:</td>
                        <td><input type="number" name="PMobNo" required placeholder="Mobile Number"></td>
                    </tr>
                    <tr>
                        <td>CVV</td>
                        <td>:</td>
                        <td><input type="password" name="CVV" required placeholder="Enter CVV" onchange="OTP()"></td>
                    </tr>
                    
                    <tr>
                        <td>OTP</td>
                        <td>:</td>
                        <td><input type="text" id="Otp" name="Otp" value="" required readonly placeholder="OTP"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><input type="password" name="Status" id="Status" value="" required hidden></td>
                    </tr>
                    <tr>
                        <th><button type="submit"  style="color: blue;background-color: black;">Proceed</button></th>
                        <td></td>
                        <th><button type="reset" style="color: red;background-color: black;">Cancel</button></th>
                    </tr>
                </table>

            </fieldset>

        </form>

      </div>
      
    </div>
    <?php
            }
            else
            {
                $ApNo=$_POST["ApNo"];
                $Nam=$_POST["Nam"];
                $Pass=$_POST["Pass"];
                $No=$_POST["No"];
                $MobNo=$_POST["PhNo"];
                $BDat=$_POST["Dat"];
                $Amt=$_POST["Amt"];
                $Status=$_POST["Status"];
                $CDNo=$_POST["CDNo"];
                $PMobNo=$_POST["PMobNo"];
                $Dat=date("y/m/d");
                $Em=$_SESSION["Email"];
                if($_SESSION["ApartNo"]==$ApNo )
                {
                    if($_SESSION["Password"]==$Pass)
                    {
                    if($Status=="Success"){
                    $conn=mysqli_connect("localhost","root","","techciti");
                    if($conn){
                        $sql="INSERT INTO techciti.bookrest(ApartmentNo,Gmail,CustomerName,NoOfTables,MobileNo,BookingCharges,BookingDate,BookedDate,CardNo,PayMobileNo,Status) VALUES('$ApNo','$Em','$Nam',$No,$MobNo,$Amt,'$BDat','$Dat',$CDNo,$PMobNo,'$Status')";
                        $res=mysqli_query($conn,$sql);
                        if($res)
                        {
                            echo "<h1>Restaurant Booked Successfully...</h1>";
                            echo "<h2>Thank You..!</h2>";
                        }else{
                            //echo mysqli_error($conn);
                            echo "<h1>Your Table is Booked Already...<br>Thank You...!</h1>";
                        }
                    }else{
                        echo "Failed";
                    }
                    }
                    else{
                        echo "<h1>Payment Failed</h1>";
                    }
                    }
                    else {
                        echo "<h1>Password Incorrect...!</h1>";
                    }

                }
                else{
                    echo "<h1>Please enter correct Apartment No</h1>";
                }
            }
            
}
else{
    echo "<center><h1>Something Went Wrong...!</h1></center>";
}
?>
</body>
      </html>