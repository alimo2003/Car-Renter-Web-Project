<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Rental</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="Mainpage.css">
  <link rel="stylesheet" href="searchbar.css">
</head>

<body>

  <header>
    <h1><a href="index2.html">Car Rental</a></h1>
  </header>

  <ul>
    <li><a class="active" href="#home">Home</a></li>
    <li><a href="profile.html">Profile</a></li>
    <li><a href="contact.html">Contact us</a></li>
    <li><a href="About.html">About</a></li>
  </ul>

  <div class="container">
    <form action="#" method="get">
      <label for="search">Search for Cars:</label>
      <input type="text" id="search" name="search" placeholder="Enter location, car type, etc.">
      <input type="submit" value="Search">
    </form>

    <!-- <section>
    <div class="search-container">
      <input type="text" id="searchInput" placeholder="Search for a car...">
      <button onclick="searchCars()">Search</button>
    </div>

    <div id="searchResults"></div>
  </section> -->

    <section>
      <?php
      $conn = mysqli_connect("localhost", "root", "2003199", "backend");

  
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
  
      // Fetch data from the database
      $sql = "SELECT * FROM `cars`";
      $result = $conn->query($sql);
      $counter=8;
      // Display data in the div
      if ($result) {
          while ($row = $result->fetch_assoc()) {
            if($row['CarAvailability']==1){
            $counter++;
            $d="details".$counter;
            echo "<div class='car' id='car1'>
               <img src='{$row['CarLink']}' width='200' height='135' alt={$row['CarName']}>
              <div id='details'>
              <h2>{$row['CarName']}</h2>
              <p>Price per day: {$row['CarPrice']}$</p>
              <button onclick=\"showDetails('{$d}')\">Show Details</button>
              </div>
              <div id='{$d}' class='car-details'>
              <h2>Details:</h2>
              <p>Model: {$row['CarModel']}<br>Color: {$row['CarColor']}</p>
            </div>
            <button onclick=\"reserveCar('{$row['CarName']}')\"><a href='checkout.html'>Reserve</a></button>
            </div>";
          }
        }
          $result->free(); // Free the result set
      } else {
        echo "No data found.";
    }
      // Close the database connection
      $conn->close();
      ?>
      
    </section>

    <div id="reservationStatus"></div>
  </div>

  <script>
    function showElement() {
      var menu = document.getElementById('menu');
      if (menu.style.display === "block") {
        menu.style.display = "none";
      } else {
        menu.style.display = "block";
      }
    }
    function showDetails(elementId) {
      var element = document.getElementById(elementId);
      element.style.display = (element.style.display === "none") ? "block" : "none";
    }

    function reserveCar(carName) {
      // Add reservation logic here
      document.getElementById('reservationStatus').innerText = 'Car reserved: ' + carName;
    }

    // function searchCars() {
    //
    //   var searchInput = document.getElementById("searchInput").value;
    //   var searchResults = document.getElementById("searchResults");
    //   searchResults.innerHTML = `<p>Showing results for: ${searchInput}</p>`;
    // }

  </script>
</body>

</html>