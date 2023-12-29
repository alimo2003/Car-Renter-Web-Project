<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Admin Dashboard</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="viewcars.css" rel="stylesheet">
  </head>

  <body>
    <button id="back"><a href="addcar.php">Add Car</a></button>
    <button id="back"><a href="deletecarp.php">Remove Car</a></button>

    <section>
    <?php
        $conn = mysqli_connect("localhost", "root", "2003199", "backend");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM `cars`";
        $result = $conn->query($sql);
        $counter=0;
        if ($result) {
            while ($row = $result->fetch_assoc()) {
              $counter++;
              $d="details".$counter;
              echo "<div class='car' id='car1'>
                <img src='{$row['CarLink']}' width='200' height='135' alt={$row['CarName']}>
                <div id='details'>
                <h2>{$row['CarName']}</h2>
                <p>Rented by: {$row['Rented by']}</p>
                </div>
                <div id='{$d}' class='car-details'>
                <h2>Details</h2>
                <p>Model:{$row['CarModel']}<br>Color:{$row['CarColor']}</p>
              </div>
              <button onclick=\"showDetails('{$d}')\">Show Details</button>
              </div>";
          }
            $result->free(); // Free the result set
        } else {
          echo "No data found.";
      }
        // Close the database connection
        $conn->close();
        ?>
    </section>
    <script>
      function showDetails(elementId) {
      var element = document.getElementById(elementId);
      element.style.display = (element.style.display === "none") ? "block" : "none";
    }
    </script>
  </body>
</html>