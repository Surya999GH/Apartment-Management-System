<?php
session_start();
if(isset($_SESSION)){
?>
<html>
    <head>
        <title>TaxiBookingPayments</title>
    
    <link type="text/css" rel="style.css">
    <style>
        .button{
            width: 200px;
            height: 70px;
            font-size: 90%;
            background-color:  rgb(12, 12, 6);
            color: rgb(41, 177, 48);
        }
        .button:hover{
        width: 250px;
        height: 90px;
        font-size: 100%;
        background-color:  rgb(150, 150, 109);
        color: black;
      }
      .but{
        width: 250px;
        height: 90px;
        font-size: 100%;
        background-color:  rgb(150, 150, 109);
        color: black;
      }
      th{
          width: 300px;
          height: 100px;
          font-size: X-large;
      }
        </style>
    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(function(){
            $('#headbar').load('Try.html');
        });
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
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; MyPayments-Taxi Booking Payments</span>
    
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
      <div style="margin: 0 auto;width: 85%;">
        <table>
            <tr>
                <th><a href="http://localhost/Surya/WBPay.php"><button class="button">WaterBill PayMents</button></a></th>
                <th><a href="http://localhost/Surya/EBPay.php"><button class="button">ElectricityBill PayMents</button></a></th>
                <th><a href="http://localhost/Surya/TBPay.php"><button class="but">TaxiBooking PayMents</button></a></th>
                <th><a href="http://localhost/Surya/RBPay.php"><button class="button">RestaurantBooking PayMents</button></a></th>
            </tr>
        </table>
        <table cellspacing="0" border="1" cellpadding="10px" style="background-color: rgb(165, 165, 51);">
        <caption><h1>Taxi Booking Payments</h1></caption>
            <tr>
                <th>Mobile Number</th>
                <th>Booking Date</th>
                <th>Booked Date</th>
                <th>BookingCharges</th>
                <th>Card No</th>
                <th>Payment MobileNo</th>
            </tr>

            <?php
                $ApNo=$_SESSION["ApartNo"];
                $Gm=$_SESSION["Email"];
                $conn=mysqli_connect("localhost","root","","techciti");
                if($conn){
                $sql="SELECT * FROM techciti.booktaxi WHERE ApartmentNo='$ApNo' and Gmail='$Gm'";
                $res=mysqli_query($conn,$sql);
                if (mysqli_num_rows($res) > 0)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
            ?>
            <tr>
                <td><?php echo $row['MobileNo']; ?></td>
                <td><?php echo $row['BookingDate']; ?></td>
                <td><?php echo $row['BookedDate']; ?></td>
                <td><?php echo $row['Amount']; ?></td>
                <td><?php echo $row['CardNo']; ?></td>
                <td><?php echo $row['PayMobileNo']; ?></td>
            </tr>
            <?php 
            }
        }
        else{
            echo "<tr><th colspan='7'><h1>No Payments</h1></th></tr>";
        }
        }
        else{
            echo "<center><h1>Something Went Wrong...!Login Again</h1></center>";
        }
        ?>
            <table>

      </div>
      
    </div>
    <?php
    }
else{
    echo "<center><h1>Something Went Wrong...!</h1></center>";
}
?>
    </body>
    </html>