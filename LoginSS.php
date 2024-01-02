<?php
    include 'MyConnection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $phonenumber = $_POST['phonenumber'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `accounts` WHERE phonenumber = '$phonenumber'";
        $result = $conn->query($sql);

        if ($result) {
            //fetch data from every row from result
            while ($row = $result->fetch_assoc()) {
                if ($row['dassword'] == $password) {
                    session_start();
                    //save variables from database through the website
                    $_SESSION['Userfname'] = $row['fname'];
                    $_SESSION['Userlname'] = $row['lname'];
                    $_SESSION['Useremail'] = $row['email'];
                    $_SESSION['UserPhone'] = $row['phonenumber'];
                    $_SESSION['UserDate'] = $row['date'];
                    
                    $response = array('success' => true, 'redirect' => ($row['User'] == 1) ? 'Mainpage.php' : 'viewcars.php');
                    echo json_encode($response);
                } else {
                    $response = array('success' => false, 'message' => 'Invalid password');
                    echo json_encode($response);
                }
            }
        } else {
            $response = array('success' => false, 'message' => 'This Number does not exist');
            echo json_encode($response);
        }

        $conn->close();
    }
?>
