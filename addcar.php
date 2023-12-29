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
      </form>
    </section>
  </div>

  <script src="script.js"></script>
</body>

</html>