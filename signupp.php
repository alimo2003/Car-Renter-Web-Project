<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Sign up</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href="signup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <script src='signup.js'></script>
    <title>Sign Up</title>
</head>
<body>
    <header><h1><a href="index2.html" id="navhomepage">Car Renter</a></h1></header>
    <div id="den">
         <div id="signupdiv">
            <h2>Sign up</h2>
            <form action="signupp.php" method="post">
            <input type="text" placeholder="First Name" id="fname" required name="fname" oninput="validatefname()">
            <input type="text" placeholder="Last Name" id="lname" name="lname"required oninput="validatelname()"><br>
            <span id="fnameerror"></span><br>
            <input type="email" placeholder="Email" id="email" name="email" required oninput="validateemail()"><br>
            <span id="emailerror"></span><br>
            <input type="password" name="password" id="password" placeholder="Password" name="password"required oninput="validatpassword()">
            <button id="togglebtn" onclick="togglepassword()">Show</button>
            <input type="password" placeholder="Confirm Password" id="confirmpassword" required oninput="Confirmpassword()"><br>
            <span id="passworderror"></span><br>
            <input type="text" placeholder="Phone Number" id="phonenumber" name="phonenumber" required oninput="validatephone()">
            <input type="date" id="date" name="date" required><br>
            <span id="phoneerror"></span><br>
            <?php
                include 'MyConnection.php';
                $first_name =  $_REQUEST['fname'];
                $last_name = $_REQUEST['lname'];
                $password =  $_REQUEST['password'];
                $date = $_REQUEST['date'];
                $email = $_REQUEST['email'];
                $phonenumber = $_REQUEST['phonenumber'];                    
                $sql2= "SELECT * FROM accounts WHERE email= $email OR phonenumber= $phonenumber";
                $res=mysqli_query($conn, $sql2);
                $sql = "INSERT INTO accounts  VALUES ('$first_name','$last_name','$email','$password','$phonenumber','$date',TRUE)";  
                if(mysqli_query($conn, $sql)){
                    header('Location: Loginps.php');
                } else{
                    echo "<span id='phperror' style='color:red;'>Email/Phone Number already used</span><br><br>";
                }
                mysqli_close($conn);
            ?>
            <button id="submitbtn">Register</button><br><br>
            <a href="Login.html" id="chn">Already have an account? Login from here</a>
            </form>
        </div>
    </div> 
</body>
</html>