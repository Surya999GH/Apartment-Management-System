<?php
session_start();
if(isset($_SESSION)){
    ?>
<html>

    <head>
        <title>Restaurant</title>
        <link type="text/css" rel="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(function(){
            $('#headbar').load('Try.html');
        });
    </script>
    <style>
        /* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
    </style>
    </head>
    <body>
        <div id="headbar"></div>
        <div style="float: left;height: auto;width: 100%;background-color: rgb(28, 44, 44);color: brown;">
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <a href="http://localhost/Surya/Restaurant.php">Restaurant</a><hr style="color:white;">
          <a href="http://localhost/Surya/SwimmingPool.php">Swimming Pool</a><hr style="color:white;">
          <a href="http://localhost/Surya/WaterSup.php">Water Supply</a><hr style="color:white;">
          <a href="http://localhost/Surya/Lift.php">Lift</a><hr style="color:white;">
          <a href="http://localhost/Surya/Spa.php">Spa</a><hr style="color:white;">
          <a href="http://localhost/Surya/Park.php">Parking Space</a><hr style="color:white;">
          <a href="http://localhost/Surya/PowBack.php">Power Backup</a><hr style="color:white;">
          <a href="http://localhost/Surya/OtherFacilities.php">Other Facilities</a><hr style="color:white;">
        </div>
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Facilities</span>
            
          </div>
          <script>
            function openNav() {
              document.getElementById("mySidenav").style.width = "250px";
            }
            
            function closeNav() {
              document.getElementById("mySidenav").style.width = "0";
            }
            </script>
        <div class="col-container" style="width: 100%;height:auto;background-color: rgb(116, 139, 32);">
            <div class="col" style="float: right;width: 15%;height: auto; text-align: center;background-color: rgb(30, 184, 184);">
                <h1  style="writing-mode: vertical-rl; padding-top: 18%;padding-left: 50px; height: 100%;">Restaurant</h1>
            </div>
            <div class="col" style="float: left;width: 85%;background-color: red;height: auto;">
<?php
    $conn=mysqli_connect("localhost","root","","techciti");
    if($conn){
        $sql="SELECT * FROM techciti.facilities WHERE Sector='Restaurant'";
        $res=mysqli_query($conn,$sql);
        
        if (mysqli_num_rows($res) > 0)
{
    
        $i=0;
        while($row = mysqli_fetch_assoc($res))
        {
            if($i%2==0)
            {
            ?>
                <div style="height: 250px;">
                    <img src="Images/<?php echo $row["Image"];?>" alt="Restaurant" style="padding: 2px; height: 250px;float: left; width: 350px;background-color: pink;">
                    <h3 style="padding-left:50% ;"><?php echo $row["Title"];?></h3>  
                    <p style="margin: 0 auto; padding: 10px;height: 180px;width: 90%;"><?php echo $row["Information"];?></p>
                </div>
                <?php
            }
            else{
                ?>
                <br><hr>
                <div style="height: 250px;">
                    <img src="Images/<?php echo $row["Image"];?>" alt="Restaurant" style="padding: 2px;height: 250px;float: right; width: 350px;background-color: pink;">
                    <h3 style="padding-left:30% ;"><?php echo $row["Title"];?></h3>    
                    <p style="margin: 0 auto; padding: 10px;height: 180px;width: 90%;"><?php echo $row["Information"];?></p>
                </div>
                <br><hr>
            <?php
            }
         
            $i=$i+1;
        }
    }
    }
    else{
        echo "<h1>Something Went Wrong...</h1> ";
    }
    $conn->close()
    ?>
            </div>
        </div>
        <script src="script.js"></script>
 <?php
    }
else{
    echo "<center><h1>Something Went Wrong...!</h1></center>";
}
?>
    </body>
</html>