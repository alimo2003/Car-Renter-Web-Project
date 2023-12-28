<?php
    $emaill =  $_REQUEST['phonenumber'];
    $password = $_REQUEST['password'];
    $conn = mysqli_connect("localhost", "root", "2003199", "backend");
      // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
      // Fetch data from the database
    $sql ="SELECT * FROM `accounts` WHERE phonenumber=$emaill";
    $result = $conn->query($sql);
    if ($result){
        
        while ($row = $result->fetch_assoc()){
            if($row['dassword']==$password){
                header('Location: Mainpage.php');
            }else{
                header('Location: Loginp.php');
            }
        }
    }
      // Close the database connection
      $conn->close();
?>