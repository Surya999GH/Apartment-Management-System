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
            $('#AdminHeadbar').load('AdminTry.html');
        });
    </script>
    <style>
        .but{
        width: 400px;
        height: 90px;
        font-size: 100%;
        background-color:  rgb(150, 150, 109);
        color: black;
      }
      .button{
            width: 350px;
            height: 90px;
            font-size: 90%;
            background-color:  rgb(12, 12, 6);
            color: rgb(41, 177, 48);
        }
        .button:hover{
        width: 400px;
        height: 90px;
        font-size: 100%;
        background-color:  rgb(150, 150, 109);
        color: black;
      }
      th{
          width: 450px;
          height: 100px;
          font-size: x-large;
      }
      #th{
         
          font-size: large;
      }
        </style>
</head>
<body style="background-image: url(http://localhost/Surya/Images/Complaints.jpg);background-attachment: fixed;background-size: cover;">
    <div id="AdminHeadbar"></div>
    <script src="adminscript.js"></script>

    <table style="width:100%; margin-bottom:20px;">
        <tr>
            <th><a href="AdminComplaints.php"><button class="but" id="th"><h1>All Complaints</h1></button></a></th>
            <th><a href="UnsolvedComplaints.php"><button class="button" id="th"><h1>Raised Complaints</h1></button></a></th>
            <th><a href="SolvedComplaints.php"><button class="button" id="th"><h1>Solved Complaints</h1></button></a></th>
        </tr>
    </table>
    <div style="height: 100%;">
    
        <!-- <div style="float: left;margin-left: 200px;padding: 20px;height: 90px;">
          <a href="AdminComplaints.php"><button class="button" style="color: #000000;background-color: rgb(38, 143, 25);"><h1>Complaints</h1></button></a> 
        </div>
      <div style="margin-right: 200px;float: right;padding: 20px;height: 90px;">
          <a href="SolvedComplaints.php"><button class="button" style="color: #000000;background-color: rgb(38, 143, 25);"><h1>Solved Complaint</h1></button></a>
      </div> -->
    <?php
      $ApNo=$_SESSION["ApartNo"];
      $conn=mysqli_connect("localhost","root","","techciti");
      if($conn){
        $sql="SELECT * FROM techciti.complaints ORDER BY Date DESC";
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
            <td><?php echo $row["UserName"]; ?></td>
            <td><?php echo $row["Sector"]; ?></td>
            <td><?php echo $row["Problem"]; ?></td>
            <td><?php echo $row["Date"]; ?></td>
            <th>
                <?php
                if($row["Status"]=="Unsolved"){
                    ?>
                <form method="post" action="Solve.php">
                <input value="<?php echo $row["ApartmentNo"]; ?>" name="ApNo" hidden>
                <input value="<?php echo $row["Sector"]; ?>" name="Sector" hidden>
                <button type="submit" style="width:200px;height:50px;color:red;background-Color:black;"><h2>Mark as Solved</h2></button>
                </form>
                <?php 
                }else{
                    ?>
                    <button style="width:200px;height:50px;"><h2>Solved</h2></button>
                    <?php
                }
                
                ?>
            </th>
        </tr>
        <?php 
            }
        }
        else{
            echo "<tr><th colspan='6'><h1>No Complaints</h1></th></tr>";
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