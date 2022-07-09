<?php
session_start();
if(isset($_SESSION)){
    ?>
<html>
    <head>
        <title>AdminCurrentServices</title>
    </head>
    
    <link type="text/css" rel="style.css">
    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(function(){
            $('#AdminHeadbar').load('AdminTry.html');
        });
    </script>
    <style>
        .but{
        width: 325px;
        height: 90px;
        font-size: 70%;
        background-color:  rgb(150, 150, 109);
        color: black;
      }
      .button{
            width: 250px;
            height: 90px;
            font-size: 70%;
            background-color:  rgb(12, 12, 6);
            color: rgb(41, 177, 48);
        }
        .button:hover{
        width: 300px;
        height: 90px;
        font-size: 90%;
        background-color:  rgb(150, 150, 109);
        color: black;
      }
      #th{
          width: 250px;
          height: 90px;
          
      }
    </style>
</head>
<body style="background-image: url(http://localhost/Surya/Images/Complaints.jpg);background-attachment: fixed;background-size: cover;">
    <div id="AdminHeadbar"></div>
    <script src="adminscript.js"></script>
    <table style="width:100%; margin-bottom:20px;">
        <tr>
            <th><a href="AllAdminServices.php"><button class="button" id="th"><h1>All Payments</h1></button></a></th>
            <th><a href="AdminWaterServices.php"><button class="button" id="th"><h1>Water Bills</h1></button></a></th>
            <th><a href="AdminCurrentServices.php"><button class="but" id="th"><h1>Electricity Bills</h1></button></a></th>
            <th><a href="AdminTaxiServices.php"><button class="button" id="th"><h1>Taxi Bills</h1></button></a></th>
            <th><a href="AdminRestServices.php"><button class="button" id="th"><h1>Restaurant Bills</h1></button></a></th>
        </tr>
    </table>
    <div style="height: 100%;">
    <?php
      $ApNo=$_SESSION["ApartNo"];
      $conn=mysqli_connect("localhost","root","","techciti");
      if($conn){
        $sql="SELECT * FROM techciti.currentbill ORDER BY Date DESC";
        $res=mysqli_query($conn,$sql);
        
    ?>
        
      <div style="height: auto;width:auto; margin: 0 auto;text-align: center;">
        <table cellspacing="0" border="1" cellpadding="10px" style="background-color: rgb(165, 165, 51);margin:0 auto; text-align:center;">
            <tr>
            <th>Apartment No</th>
            <th>State</th>
            <th>Service Provider</th>
            <th>Consumer Number</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Status</th>
            </tr>
            <?php
            if (mysqli_num_rows($res) > 0)
            {
            while($row = mysqli_fetch_assoc($res))
            {
        ?>
        <tr>
            <td><?php echo $row["ApartmentNo"]; ?></td>
            <td><?php echo $row["State"]; ?></td>
            <td><?php echo $row["ServiceProvider"]; ?></td>
            <td><?php echo $row["ConsumerNo"]; ?></td>
            <td><?php echo $row["Amount"]; ?></td>
            <td><?php echo $row["Date"]; ?></td>
            
            <th>
            <button type="submit" style="width:200px;height:50px;color:red;background-Color:black;"><h2><?php echo $row["Status"]; ?></h2></button>
            </th>
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
        </table>
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