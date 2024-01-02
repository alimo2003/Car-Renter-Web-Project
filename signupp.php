<?php
    include 'MyConnection.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $first_name = $_POST['fname'];
        $last_name = $_POST['lname'];
        $password = $_POST['password'];
        $date = $_POST['date'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];

        $sql2 = "SELECT * FROM accounts WHERE email = '$email' OR phonenumber = '$phonenumber'";
        $res = mysqli_query($conn, $sql2);

        if (mysqli_num_rows($res) > 0) {
            $response = array('success' => false, 'message' => 'Email/Phone Number already used');
            echo json_encode($response);
        } else {
            $sql = "INSERT INTO accounts VALUES ('$first_name', '$last_name', '$email', '$password', '$phonenumber', '$date', TRUE,0000000000000000,'2024-01-01')";
            if (mysqli_query($conn, $sql)) {
                $response = array('success' => true);
                echo json_encode($response);
            } else {
                $response = array('success' => false, 'message' => 'Error inserting data');
                echo json_encode($response);
            }
            }
            mysqli_close($conn);
    }
?>