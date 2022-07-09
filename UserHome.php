<?php
session_start();
if(isset($_SESSION)){
    ?>
<html>
    <head><Title>Surya Apartments</Title>
      
        <style>
            ul {
              list-style-type: none;
              margin: 0;
              padding: 0;
              overflow: hidden;
              background-color: #333;
            }
            
            li {
              float: left;
            }
            
            li a {
              display: block;
              color: white;
              text-align: center;
              padding: 14px 16px;
              text-decoration: none;
            }
            
            li a:hover:not(.active) {
              background-color: #111;
            }
            
            .active {
              background-color: #04AA6D;
            }
            button{
  border-radius: 40px;
}
            
.marquee {
  background-color: #ddd;
  width: 85%;
  margin: 0 auto;
  overflow: hidden;
  white-space: nowrap;
}
.marquee span {
  display: inline-block;
  font-size: 20px;
  position: relative;
  left: 100%;
  animation: marquee 22s linear infinite;
}
.marquee:hover span {
  animation-play-state: paused;
}

.marquee span:nth-child(1) {
  animation-delay: 0s;
}
.marquee span:nth-child(2) {
  animation-delay: 0.8s;
}
.marquee span:nth-child(3) {
  animation-delay: 1.6s;
}
.marquee span:nth-child(4) {
  animation-delay: 2.4s;
}
.marquee span:nth-child(5) {
  animation-delay: 3.2s;
}

@keyframes marquee {
  0%   { left: 100%; }
  100% { left: -100%; }
}

            </style>
    </head>
    <body style="background-image: url(Bg.jpg);background-attachment: fixed;background-size: cover;">
        <header>
            <div style="text-align: center; font-size: 80px; color: #acec16;background-color: #073634;">Surya Aparatments</div>
        </header>
        <ul>
            <li><a href="http://localhost/Surya/UserHome.php">Home</a></li>
            <!-- <li><a href="Rooms.php">Rooms</a></li> -->
            <li><a href="Services.html">Services</a></li>
            <li><a href="Facilities.html">Facilities</a></li>
            <li><a href="http://localhost/Surya/Complaints.php">Complaints</a></li>
            <li><a href="Info.html">Info</a></li>
            <li style="float:right"><a class="active" href="http://localhost/Surya/LogOut.php">LogOut</a></li>
            
          </ul>
          <br>
          <h1  style="font-size:xx-large; width:50%; margin:0 auto ;text-align:center;">Welcome to Surya Apartments</h1>
          <br>
          <div class="marquee">
          <span><img src="Home1.jpg" style="padding: 5px;"></span>
          <span><img src="Home2.jpg" style="padding: 2px;"></span>
          <span><img src="Home3.jpg" style="padding: 2px;"></span>
          <span><img src="Home4.jpg" style="padding: 2px;"></span>
          
          </div>
          <br><br>
          <div style="height: 150px;width: 100%;"><center><table cellspacing="20px"><tr>
            <td><a href="http://localhost/Surya/Facilities.html"><button type="button" style="height: 100px;width: 200px;font-size: x-large; padding: 5px;color: rgb(212, 147, 147);background-color: rgb(0, 0, 0);">Facilities</button></a>
            <td><a href="http://localhost/Surya/Services.html"><button type="button" style="height: 100px;width: 200px;font-size: x-large;padding: 5px;color: rgb(185, 131, 131);background-color: rgb(0, 0, 0);">Services</button></a>
          </tr></table>
          </center>
          </div>
          <div style="width: 100%;height: 250px;border: 1px;">
            <div style="height: 100%;width: 450px; float: left; text-align: center;margin-left:10%"><a href="http://localhost/Surya/Facilities.php"><img src="http://localhost/Surya/Images/Facilities.png" height="100%" width="450px" title="Facilities"><b>Facilities</b></a></div>
            <div style="float: right;width: 450px;height: 100%;text-align: center;margin-right:10%"><a href="http://localhost/Surya/Services.php"> <img src="http://localhost/Surya/Images/Services.jpg" height="100%" width="450px" title="Services"><b>Services</b></a></div>
            <!-- <div style="width: 450px;height: 100%;margin: 0 auto;text-align: center;"><a href="http://localhost/Surendra/Rooms.php"><img src="" height="100%" width="450px" title="Availability"><b>Availability</b></a> </div> -->
        </div> 

          
    </body>
</html>
<?php
// print_r($_SESSION);
}
else{
    echo "<center><h1>Something Went Wrong...!</h1></center>";
}
?>