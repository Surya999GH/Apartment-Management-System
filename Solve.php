<?php
session_start();
if(isset($_SESSION)){
    if($_POST)
    {
    $ApNo=$_POST["ApNo"];
    $Section=$_POST["Sector"];
    echo $Section;
    $conn=mysqli_connect("localhost","root","","techciti");
    if($conn){
      $sql="UPDATE techciti.complaints SET Status='Solved' WHERE ApartmentNo=$ApNo and Sector='$Section'";
      $res=mysqli_query($conn,$sql);
      if($res)
      {
        echo "<h1>Updated successfully...</h1>";
        header("location:http://localhost/Surya/SolvedComplaints.php");
      }
      else{
        echo "<h1>Something Went Wrong</h1>";
      }
    }
    }
    else{
      echo "<h1>Data not Found</h1>";
    }
  }
  else{
      echo "<center><h1>Something Went Wrong...!</h1></center>";
  }

  ?>