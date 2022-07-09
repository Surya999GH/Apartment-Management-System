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
</head>
<body style="background-image: url(Bg.jpg);background-attachment: fixed;background-size: cover;">
      <div id="headbar"></div>
      <div style="float: left;height: auto;width: 100%;background-color: rgb(28, 44, 44);color: brown;">
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="BookRoom.php">Book Rooms</a>
      <a href="Availability.php">Check Availability</a>
      
    </div>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Bookings</span>
    
  </div>
      <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }
    
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
    </script>
    <script src="script.js"></script>
      <div style="float: right;width: 15%;height: 100%; text-align: center;background-color: aqua;">
          <h1 style="writing-mode: vertical-rl; padding: 50px;height: 85%;">Rooms</h1>
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
