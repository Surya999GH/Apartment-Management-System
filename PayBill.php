<?php
session_start();
if(isset($_SESSION)){
    ?>
<html>
    <head>
        <title>Complaints</title>
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
        function Paid()
        {
            alert("Bill Paid Successfully");
        }
    </script>
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
    </div>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Electricity Bill Payment</span>
    
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
          <h1 style="writing-mode: vertical-rl; padding: 50px;height: 85%;">Services</h1>
      </div>
      <div style="float: left;width: 85%;">
        <form method="post" action="PayBill.php">
            <fieldset style="height: auto;width: 30%;margin: 0 auto;text-align: center; padding: 150px; background-color: rgb(172, 240, 172);opacity: 90%;">
                <table cellspacing="15px">
                    <tr>
                        <td>Enter Card Number</td>
                        <td>:</td>
                        <td><input type="number" name="CardNo" required placeholder="Credit/Debit Card No"></td>
                    </tr>
                    <tr>
                        <td>Enter CVV</td>
                        <td>:</td>
                        <td><input type="number" name="CVV" required placeholder="CVV No"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><input type="password" name="Pass" required placeholder="Password"></td>
                    </tr>
                    <tr>
                        <th><button type="submit" onclick="Paid()" style="color: blue;background-color: black;">Pay</button></th>
                        <td></td>
                        <th><button type="reset" style="color: red;background-color: black;">Cancel</button></th>
                    </tr>
                </table>

            </fieldset>

        </form>

      </div>
      
    </div>
      </body>
      </html>
      <?php
print_r($_SESSION);
}
else{
    echo "<center><h1>Something Went Wrong...!</h1></center>";
}
?>