<?php
session_start();
if(isset($_SESSION)){
    ?>
<html>
    <head>
        <title>Taxi Booking</title>
    </head>
    
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
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Book Taxi</span>
    
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
          <h1 style="writing-mode: vertical-rl; padding: 50px;height: 85%;">Taxi Booking</h1>
      </div>
      <div style="float: left;width: 85%;">
        <form method="post" action="Taxi.php">
            <fieldset style="height: auto;width: 30%;margin: 0 auto;text-align: center; padding: 150px; background-color: rgb(172, 240, 172);opacity: 90%;">
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
                        <td>Mobile No</td>
                        <td>:</td>
                        <td><input type="number" name="MobNo" required placeholder="Mobile No"></td>
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
                        <td>Booking Charges</td>
                        <td>:</td>
                        <td><input type="number" name="Amt" value="100" readonly></td>
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
                        <th><button type="submit" style="color: blue;background-color: black;">Proceed</button></th>
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
                $Pass=$_POST["Pass"];
                $MobNo=$_POST["MobNo"];
                $BokDat=$_POST["Dat"];
                $Amt=$_POST["Amt"];
                $Status=$_POST["Status"];
                $PMobNo=$_POST["PMobNo"];
                $CDNo=$_POST["CDNo"];
                $Dat=date("y/m/d");
                $Em=$_SESSION["Email"];
                if($_SESSION["ApartNo"]==$ApNo )
                {
                    if($_SESSION["Password"]==$Pass)
                    {
                    if($Status=="Success"){
                    $conn=mysqli_connect("localhost","root","","techciti");
                    if($conn){
                        // CREATE TABLE `techciti`.`booktaxi` ( `ApartmentNo` VARCHAR(10) NOT NULL , `Gmail` VARCHAR(30) NOT NULL , `MobileNo` INT NOT NULL , `BookingDate` DATE NOT NULL , `BookedDate` DATE NOT NULL , `Amount` INT NOT NULL , `CardNo` INT NOT NULL , `PayMobileNo` INT NOT NULL , `Status` VARCHAR(10) NOT NULL , PRIMARY KEY (`BookingDate`, `MobileNo`)) ENGINE = InnoDB;
                        $sql="INSERT INTO techciti.booktaxi(ApartmentNo,Gmail,MobileNo,BookingDate,BookedDate,Amount,CardNo,PayMobileNo,Status) VALUES('$ApNo','$Em',$MobNo,'$BokDat','$Dat',$Amt,$CDNo,$PMobNo,'$Status')";
                        $res=mysqli_query($conn,$sql);
                        if($res)
                        {
                            echo "<h1>Your Taxi Booked Successfully... On ". $BokDat."</h1>";
                            echo "<h2>Thank You..!<br>Have a safe Journey</h2>";

                        }else{
                            //echo mysqli_error($conn);
                            echo "<h1>Your Taxi is Booked Already...<br>Thank You...!</h1>";
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
      