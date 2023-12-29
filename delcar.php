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

    <section>
      <h2>Add a Car</h2>
      <form id="addCarForm" action="delcar.php" method="post">

      <input type="text" id="carName" placeholder="Car Name" required name="Name">
      <input type="text" id="carModel" placeholder="Car Model" required name="Model">
      <input type="text" id="carName" placeholder="Color" required name="Color">
      <button>Delete Car</button>
      <?php
      include 'MyConnection.php';

$carname = mysqli_real_escape_string($conn, $_REQUEST['Name']);
$carmodel = mysqli_real_escape_string($conn, $_REQUEST['Model']);
$color = mysqli_real_escape_string($conn, $_REQUEST['Color']);

$sql2 = "SELECT * FROM cars WHERE CarName = '$carname'";
$result = $conn->query($sql2);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        if ($row['CarModel'] == $carmodel && $row['CarColor'] == $color) {
            $sql = "DELETE FROM cars WHERE CarName = '$carname' AND CarModel = '$carmodel' AND CarColor = '$color'";
            
            if (mysqli_query($conn, $sql)) {
                echo "<span id='phperror' style='color:green;'>Car Deleted Successfully!</span><br><br>";
            } else {
                echo "<span id='phperror' style='color:red;'>Something Went Wrong Please Try Again</span><br><br>";
            }
        } else {
            echo "<span id='phperror' style='color:red;'>This Car doesn't Exist</span><br><br>";
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>

      </form>
    </section>
  </div>

  <script src="script.js"></script>
</body>

</html>