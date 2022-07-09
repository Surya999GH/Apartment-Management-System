<?php
session_start();
if(isset($_SESSION)){
    ?>
<html>
    <head>
        <title>MyComplaints</title>
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
      th{
          width: 300px;
          height: auto;
          font-size: X-large;
      }
        </style>
</head>
<body style="background-image: url(http://localhost/Surya/Images/Complaints.jpg);background-attachment: fixed;background-size: cover;">
    <div id="headbar"></div>
    <script src="script.js"></script>
    
    <div style="height: 100%;">
        <div style="float: left;margin-left: 200px;padding: 20px;height: 90px;">
          <a href="Complaints.html"><button class="button" style="color: #000000;background-color: rgb(38, 143, 25);"><h1>Register Complaint</h1></button></a> 
        </div>
      <div style="margin-right: 200px;float: right;padding: 20px;height: 90px;">
          <a href="ComWithdraw.html"><button class="button" style="color: #000000;background-color: rgb(38, 143, 25);"><h1>WithDraw Complaint</h1></button></a>
      </div>
    <?php
      $ApNo=$_SESSION["ApartNo"];
      $conn=mysqli_connect("localhost","root","","techciti");
      if($conn){
        $sql="SELECT * FROM techciti.complaints WHERE ApartmentNo='$ApNo'";
        $res=mysqli_query($conn,$sql);
        
    ?>
        
      <div style="height: auto;margin: 0 auto;text-align: center;float: left;">
        <table cellspacing="0" border="1" cellpadding="10px" style="background-color: rgb(165, 165, 51);">
            <tr>
            <th>Apartment No</th>
            <th>Name</th>
            <th>Problem Sector</th>
            <th>Problem</th>
            <th>Date</th>
            </tr>
            <?php
            if (mysqli_num_rows($res) > 0)
            {
            while($row = mysqli_fetch_assoc($res))
            {
        ?>
        <tr>
            <td><?php echo $row["ApartmentNo"]; ?></td>
            <td><?php echo $row["UserName"]; ?></td>
            <td><?php echo $row["Sector"]; ?></td>
            <td><?php echo $row["Problem"]; ?></td>
            <td><?php echo $row["Date"]; ?></td>
        </tr>
        <?php 
            }
        }
        else{
            echo "<tr><th colspan='5'><h1>No Complaints</h1></th></tr>";
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