<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin dashboard</title>
  <link rel="stylesheet" href="admin.css">
</head>

<body>
  <div class="container">
    <h1><a href="viewcars.php">Go Back</a></h1>
    <h1>Car Rental Admin Page</h1>

    <!-- Option 2: Add a Car Form -->
    <section>
      <h2>Add a Car</h2>
      <form id="addCarForm" action="addcarr.php" method="post">
      <input type="text" id="carName" placeholder="Car Name" required name="Name">
      <input type="text" id="carimage" placeholder="Car Image Link" required name="Image">
      <input type="text" id="carModel" placeholder="Car Model" required name="Model">
      <input type="text" id="carName" placeholder="Daily Rent" required name="DailyRent">
      <input type="text" id="carName" placeholder="Color" required name="Color">
      <button>Add Car</button>


      <?php
        include 'MyConnection.php';
        $carname = mysqli_real_escape_string($conn, $_REQUEST['Name']);
        $carlink = mysqli_real_escape_string($conn, $_REQUEST['Image']);
        $carmodel = mysqli_real_escape_string($conn, $_REQUEST['Model']);
        $dailyrent = mysqli_real_escape_string($conn, $_REQUEST['DailyRent']);
        $color = mysqli_real_escape_string($conn, $_REQUEST['Color']);

        $sql2 = "SELECT * FROM `cars` WHERE CarName='$carname'";
        $result = $conn->query($sql2);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                if ($row['CarModel'] == $carmodel && $row['CarColor'] == $color) {
                echo "<span id='phperror' style='color:red;'>This Car Already Exists</span><br><br>";
                exit; // Exit the script if the car already exists
            }
        }
        }
        $sql = "INSERT INTO `cars`(`CarLink`, `CarName`, `CarPrice`, `CarAvailability`, `CarModel`, `CarColor`, `Rented by`, `Rented Until`, `Rented From`, `RentedPrice`)
         VALUES ('$carlink', '$carname', '$dailyrent', TRUE, '$carmodel', '$color', 'NONE',null,null,null)";

        if (mysqli_query($conn, $sql)) {
            echo "<span id='phperror' style='color:green;'>Added Successfully!</span><br><br>";

        } else {
            echo "<span id='phperror' style='color:red;'> Error" . mysqli_error($conn) ."</span><br><br>";
        }
            mysqli_close($conn);
        ?>

        </form>
        </section>
    </div>
     <script src="script.js"></script>
</body>

</html>
