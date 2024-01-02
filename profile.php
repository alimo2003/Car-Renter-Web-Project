<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Info</title>
    <link rel="stylesheet" type="text/css" href="profile.css">
</head>
<body>
    <header>
        <h1><a href="MainPage.php" id="navhomepage">Car Renter</a></h1>
    </header>
    <div id="den">
        <div id="contactInfo">
            <span class="text">Name: </span>
            <?php echo $_SESSION['Userfname'] . ' ' . $_SESSION['Userlname'];?><br><br><br>
            <span class="text">Email: </span>
            <?php echo $_SESSION['Useremail'];?><br><br><br>
            <span class="text">Phone: </span>
            <?php echo $_SESSION['UserPhone'];?><br><br><br>
            <span class="text">Date Of Birth: </span>
            <?php echo $_SESSION['UserDate'];?><br><br><br>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
