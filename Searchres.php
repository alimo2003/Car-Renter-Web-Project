<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Rental</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="Mainpage.css">
  <link rel="stylesheet" href="searchbar.css">
  <script src="Mainpage.js"></script>
</head>

<body>
  <header>
    <h1><a href="MainPage.php">Car Rental</a></h1>
  </header>
  <ul>
    <li><a class="active" href="#home">Home</a></li>
    <li><a href="profile.html">Profile</a></li>
    <li><a href="contact.html">Contact us</a></li>
    <li><a href="About.html">About</a></li>
    <li><a href="Logout.php">Logout</a></li>

  </ul>
  
  <div class="container">   
     <div id="search-container">
        <form id="searchform" action="Searchres.php" method="post">
            <input type="text" id="searchterm" name="searchterm" required placeholder="Search by Car Name">
            <button type="submit">Search</button>
        </form>
    </div>

  <section>
    <?php
    include 'MyConnection.php';

    $Searchterm= $_POST['searchterm'];

      $sql = "SELECT * FROM `cars` WHERE `CarName` LIKE '%$Searchterm%'";
      $result = $conn->query($sql);
      $counter=0;
      if ($result) {
          while ($row = $result->fetch_assoc()) {
            if($row['CarAvailability']==1){
            $counter++;
            $d="details".$counter;
            echo 
            "<div class='car' id='car1'>
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
            <button onclick=\"reserveCar('{$row['CarName']}','{$row['CarColor']}','{$row['CarModel']}',{$row['CarPrice']},'{$row['CarID']}')\">Reserve</button>
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

    function reserveCar(carName, carColor, carModel,carPrice,carid) {
    // Encode the details to handle special characters
    const encodedCarName = encodeURIComponent(carName);
    const encodedCarColor = encodeURIComponent(carColor);
    const encodedCarModel = encodeURIComponent(carModel);
    const encodedCarPrice = encodeURIComponent(carPrice);
    const encodedCarid = encodeURIComponent(carid);
    
    // Redirect to the checkout.html page with the details as parameters
    window.location.href = `checkout.php?carName=${encodedCarName}&carColor=${encodedCarColor}&carModel=${encodedCarModel}&carPrice=${encodedCarPrice}&carid=${encodedCarid}`;
    }

  </script>
</body>

</html>