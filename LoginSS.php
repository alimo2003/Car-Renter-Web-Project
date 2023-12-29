<?php
    include 'MyConnection.php';
    $emaill = $_REQUEST['phonenumber'];
    $password = $_REQUEST['password'];

    $sql ="SELECT * FROM `accounts` WHERE phonenumber=$emaill";
    $result = $conn->query($sql);
    if ($result){
        
        while ($row = $result->fetch_assoc()){
            if($row['dassword']==$password){
                session_start;
                header('Location: Mainpage.php');
            }else{
                header('Location: Loginp.php');
            }
        }
    }
    $conn->close();
?>