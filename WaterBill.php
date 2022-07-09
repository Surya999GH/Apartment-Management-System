<?php
session_start();
if(isset($_SESSION)){
    ?>
<html>
    <head>
        <title>Water Bill</title>
    
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
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Water Bill</span>
    
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
          <h1 style="writing-mode: vertical-rl; padding: 50px;height: 85%;">Water Bill</h1>
      </div>
      <div style="float: left;width: 85%;">
        <form method="post" action="#">
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
                        <td>State</td>
                        <td>:</td>
                        <td><input type="text" name="St" readonly value="Andhra Pradesh"></td>
                    </tr>
                    <tr>
                        <td>RR Number</td>
                        <td>:</td>
                        <td><input type="text" name="ConNo" required placeholder="Service No"></td>
                    </tr>
                    <tr>
                        <td>Water Board</td>
                        <td>:</td>
                        <td><select style="border-radius: 12px;" name="Board">
                            <option value="BWSSB">Banglore Water Supply</option>
                            <option value="GWMC" selected>Greater Warangal Corporation</option>
                            <option value="DJB">Delhi Jal Board</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Amount</td>
                        <td>:</td>
                        <td><input type="number" name="Amount" required placeholder="Bill Amount"></td>
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
                        <td><input type="password" name="Status" id="Status" value="Success" required hidden></td>
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
                $St=$_POST["St"];
                $Pass=$_POST["Pass"];
                $ConNo=$_POST["ConNo"];
                $Bord=$_POST["Board"];
                $Amt=$_POST["Amount"];
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
                        // CREATE TABLE `techciti`.`waterbill` ( `ApartmentNo` VARCHAR(10) NOT NULL , `Gmail` VARCHAR(30) NOT NULL , `State` VARCHAR(25) NOT NULL , `Board` VARCHAR(40) NOT NULL , `RR Number` VARCHAR(25) NOT NULL , `Amount` INT NOT NULL , `Date` DATE NOT NULL , `Card No` INT NOT NULL , `PayMobileNo` INT NOT NULL , `Status` VARCHAR(10) NOT NULL , PRIMARY KEY (`ApartmentNo`, `Date`)) ENGINE = InnoDB;
                        $sql="INSERT INTO techciti.waterbill(ApartmentNo,Gmail,State,Board,RRNumber,Amount,Date,CardNo,PayMobileNo,Status) VALUES('$ApNo','$Em','$St','$Bord','$ConNo',$Amt,'$Dat',$CDNo,$PMobNo,'$Status')";
                        if(mysqli_query($conn,$sql))
                        {
                            echo "<h1>Bill Paid Successfully...</h1>";
                            echo "<h2>Thank You..!</h2>";
                        }else{
                            echo "<h1>Your Bill is Paid Already...<br>Thank You...!</h1>";
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