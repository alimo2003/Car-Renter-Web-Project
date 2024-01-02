
<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout</title>
  <link href="checkout.css" rel="stylesheet">
</head>

<body>

  <header>
  <h1><a href="MainPage.php" id="main2">Car Rental</a></h1><br>
  </header>
  <section>
   <h1 id="checkouterror"></h1>
  </section>

</body>

</html>
<?php
include 'MyConnection.php';
    $renyby = $_SESSION['Useremail'];
    $renteduntil = $_POST['returnDate'];
    $rentedfrom = $_POST['pickupDate'];
    $totalprice = $_POST['Totalprice'];
    $carid = $_POST['Carid'];
    $cardNumber= $_POST['CardNumber'];
    $Validuntil= $_POST['Validuntil'];

$sql = "UPDATE `cars` SET `CarAvailability`= 0,`Rented by`='$renyby',`Rented Until`='$renteduntil', `Rented From`='$rentedfrom',`RentedPrice`=$totalprice WHERE CarID= $carid;";
$sql2 = "UPDATE `accounts` SET `Card Number`= $cardNumber ,`ValidUntil`='$Validuntil' WHERE email= '$renyby';";
$result = $conn->query($sql);
if ($result) {
  $result2 = $conn->query($sql2);
  if($result2){
    echo "<script> 
    const cardNumberInput = document.getElementById('checkouterror');

    cardNumberInput.textContent='Successfully Reserved!, you can leave this page and head to the store at the day you reserved to pickup the car and proceed through details';
    cardNumberInput.style.color = 'green';

    </script>";
  }else {
    echo "<script> 
    const cardNumberInput = document.getElementById('checkouterror');

    cardNumberInput.textContent='Something went wrong';
    cardNumberInput.style.color = 'red';

    </script>";
  }
} else {
    echo "<script> 
    const cardNumberInput = document.getElementById('checkouterror');

    cardNumberInput.textContent='Something went wrong';
    cardNumberInput.style.color = 'red';

    </script>";
}

// Close the database connection
$conn->close();
?>
