<?php
session_start();
if(isset($_SESSION)){
    ?>
<html>
    <head>
        <title>Complaints</title>
    </head>
    
    <link type="text/css" rel="style.css">
    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(function(){
            $('#headbar').load('Try.html');
        });
    </script>
    <style>
        .button:hover{
        width: 350px;
        height: 90px;
        font-size: 100%;
      }
        </style>
</head>
<body style="background-image: url(http://localhost/Surya/Images/Complaints.jpg);background-attachment: fixed;background-size: cover;">
    <div id="headbar"></div>
    <script src="script.js"></script>
    
      <div style="float: right;width: 15%;height: 100%; text-align: center;background-color: aqua;">
          <h1 style="writing-mode: vertical-rl; padding: 50px;height: 85%;">Complaints</h1>
      </div>
      <div style="float: right;padding: 20px;">
        <a href="MyComplaints.php"><button class="button" style="color: #000000;background-color: rgb(38, 143, 25);"><h1>My Complaints</h1></button></a>
    </div>
      <div style="height: 100%;">
      <div style="float: left;height:85%;padding: 10%;margin-left: 10%;">
        <form method="post" action="http://localhost/Surya/Complaints.php">
          <fieldset style="color: black;background-color: azure;opacity: 70%;">
              <?php
      if(!$_POST)
      {
        ?>
              <legend style="background-color: rgb(240, 97, 40);border-radius: 100px;"><h1 >Complaint</h1></legend>
              <table>
                  <tr>
                      <td><b>Apartment No</b></td>
                      <td>:</td>
                      <td><input type="text" id="ApNo" name="ApNo" placeholder="Apartment No" required></td>
                  </tr>
                  <tr>
                    <td><b>Name</b></td>
                    <td>:</td>
                    <td><input type="text" id="UName" name="UName" placeholder="Your Name" required></td>
                </tr>
                <tr>
                    <td><b>Password</b></td>
                    <td>:</td>
                    <td><input type="password" name="Pass" id="WPass" placeholder="Enter Password"></td>
                </tr>
                <tr>
                    <td><b>Select complaint sector</b></td>
                    <td>:</td>
                    <td>
                        <select class="select" required name="Sector">
                            <option value="NULL">Select</option>
                            <option value="Electricity" id="Elec">Electricity</option>
                            <option value="Water" id="Water">Water</option>
                            <option value="Cleaning" id="Clean">Cleaning</option>
                            <option value="HouseHolds" id="HHolds">HouseHolds</option>
                            <option value="Others" id="Others">Others Sector</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><b>Mention Problem</b></td>
                    <td>:</td>
                    <td><textarea class="area" name="Problem" placeholder="Problem" rows="5" cols="20" required></textarea></td>
                </tr>
                <tr>
                    <th><button type="submit" style="background-color: rgb(128, 65, 6);color: white;">Complaint</button></th>
                    <td></td>
                    <th><button type="reset" style="background-color: blue;color: white;">Cancel</button></th>
                </tr>
              </table>
          </fieldset>
          </form>
      
          <?php
            }
            else
            {
                $ApNo=$_POST["ApNo"];
                $Name=$_POST["UName"];
                $Sec=$_POST["Sector"];
                $Pass=$_POST["Pass"];
                $Problem=$_POST["Problem"];
                $Dat=date("y/m/d");
                $Stat="Unsolved";
                if($_SESSION["ApartNo"]==$ApNo )
                {
                    if($_SESSION["Password"]==$Pass)
                    {
                    $conn=mysqli_connect("localhost","root","","techciti");
                    if($conn){
                        $sql="insert into complaints(ApartmentNo,UserName,Sector,Problem,Date,Status) values('$ApNo','$Name','$Sec','$Problem','$Dat','$Stat')";
                        $res=mysqli_query($conn,$sql);
                        if($res)
                        {
                            echo "<h1>Complaint registered Successfully...</h1>";
                            echo "<h2>Please wait for our response.Thank You..!</h2>";
                        }
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
            ?>
      </div>
      <div style="margin: 0px;padding: 10%;margin-left: 600px;">
          <a href="http://localhost/Surya/ComWithdraw.php"><button class="button" style="color: #000000;background-color: rgb(38, 143, 25);"><h1>WithDraw Complaint</h1></button></a>
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