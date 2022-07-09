<?php
session_start();
if(isset($_SESSION)){
    ?>
<html>
    <head>
        <title>AddFacilities</title>
    </head>
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link type="text/css" rel="style.css">
    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(function(){
            $('#adminheadbar').load('AdminTry.html');
        });
    </script>
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
</head>
<body style="background-image: url(Bg.jpg);background-attachment: fixed;background-size: cover;">
      <div id="adminheadbar"></div>
      <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }
    
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
    </script>
    <script src="adminscript.js"></script>
      
      <div style="float: left;height: auto;width: 100%;background-color:rgb(28, 44, 44);color: brown;">
        <div id="mySidenav" class="sidenav" >
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <a href="AdminFacilities.php">Upload to Facilities</a><hr style="color=white;">
          <a href="AdminFacilitiesRemove.php">Remove from Facilities</a>
          
        </div>
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;Upload to Facilities</span>
        
      </div>
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
          <h1 style="writing-mode: vertical-rl; padding: 50px;height: 85%;">Upload to Facilities</h1>
      </div>
      <div style="float: left;width: 85%;">
        <form method="post" action="AdminFacilities.php">
            <fieldset style="height: auto;width: 30%;margin: 0 auto;text-align: center; padding: 150px; background-color: blueviolet;opacity: 90%;">
            <?php
      if(!$_POST)
      {
        ?>     
            <table cellspacing="15px">
                    <tr>
                        <td>Image</td>
                        <td>:</td>
                        <td><input type="file" name="Img" required placeholder="Image"></td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>:</td>
                        <td><input type="text" name="Tit" required placeholder="Title"></td>
                    </tr>
                    <tr>
                        <td>Enter Information</td>
                        <td>:</td>
                        <td><textarea name="Info" required placeholder="Info about Image" rows="5" cols="50"></textarea></td>
                    </tr>
                    <tr>
                        <td>Facility Section</td>
                        <td>:</td>
                        <td><select name="Sec" required>
                            <option value="Restaurant">Restaurant</option>
                            <option value="Swim Pool">Swimming Pool</option>
                            <option value="Water Supply">Water Supply</option>
                            <option value="Lift">Lift</option>
                            <option value="Spa">Spa</option>
                            <option value="Parking">Parking</option>
                            <option value="Power Backup">Power Backup</option>
                            <option value="Others">Others</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                    <th><button type="submit"  style="color: blue;background-color: black;">Upload</button></th>
                        <td></td>
                        <th><button type="reset" style="color: red;background-color: black;">Cancel</button></th>
                    </tr>
                    
                    
                </table>

            </fieldset>

        </form>

      </div>
      
    </div>
      <div>
      <?php
            }
            else
            {
                $Img=$_POST["Img"];
                $Title=$_POST["Tit"];
                $Info=$_POST["Info"];
                $Section=$_POST["Sec"];
                $Dat=date("y/m/d");
                $Em=$_SESSION["Email"];
                if($_SESSION["Email"]=="admin@gmail.com" )
                {
                    if($_SESSION["Password"]=="Admin")
                    {
                    
                    $conn=mysqli_connect("localhost","root","","techciti");
                    if($conn){
                        // CREATE TABLE `techciti`.`facilities` ( `Image` MEDIUMBLOB NOT NULL , `Title` VARCHAR(30) NOT NULL , `Information` VARCHAR(250) NOT NULL , `Sector` VARCHAR(25) NOT NULL , `Date` DATE NOT NULL , PRIMARY KEY (`Title`, `Sector`)) ENGINE = InnoDB;
                        $sql="INSERT INTO techciti.facilities(Image,Title,Information,Sector,Date) VALUES('$Img','$Title','$Info','$Section','$Dat')";
                        $res=mysqli_query($conn,$sql);
                        if($res)
                        {
                            echo "<h1>Uploaded Successfully...</h1>";
                        }else{
                            echo "<h1>Title Added Already...<br>Thank You...!</h1>";
                        }
                    }else{
                        echo "Failed";
                    }
                    }
                    else {
                        echo "<h1>Password Incorrect...!<br>Login Again</h1>";
                    }

                }
                else{
                    echo "<h1>You Don't have permission to change</h1>";
                }
            }
            
}
else{
    echo "<center><h1>Something Went Wrong...!</h1></center>";
}
?>
</body>
      </html>