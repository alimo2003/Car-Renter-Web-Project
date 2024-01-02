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
    <form action="Checkoutp.php" method="post" id="checkoutform">
      
      <label for="name">Name:</label>
      <?php
        echo $_SESSION['Userfname'] . ' ' . $_SESSION['Userlname'];
      ?><br><br>

      <label for="email">Email:</label>
      <label id="ema">  <?php echo $_SESSION['Useremail'];?></label><br>

      <label for="phone">Phone:</label>
      <?php
        echo $_SESSION['UserPhone'];
      ?><br><br>

      <label>Car ID: </label>
      <input id="selectedCarID" name="Carid"><br>

      <label>Car Name: </label>
      <input id="selectedCarName" name="Carname"><br>

      <label>Color: </label>
      <input id="selectedCarColor" name="Carcolor"><br>

      <label>Car Model: </label>
      <input id="selectedCarModel" name="CarModel"><br>

      <label for="pickupDate">From: </label>
      <input type="date" id="pickupDate" name="pickupDate" required>

      <label for="returnDate">Until: </label>
      <input type="date" id="returnDate" name="returnDate" required><br>

      <label for="rentperday">Rent Per Day: </label>
      <label id="selectedCarRentperday"></label><br>

      <label for="numberofdays">For (Days): </label>
      <label id="resnumofdays"></label><br>

      <label for="totalpayment">Total: </label>
      <input id="restotalpayment" name="Totalprice"><br>


      <input type="text" id="cardnumberinput" name="CardNumber" required placeholder="Card number without spaces"><br>
      <label for="carderror" id="CardError"></label>
      <label for="validuntil">Valid Until: </label>
      <input type="date" id="validuntil" name="Validuntil" required><br>

      <label for="checkouterror" id="checkouterror"></label>
      <button type="submit" onclick="kik()">Submit</button>
      <button  onclick="goBack()">Back</button>

    </form>
  </section>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
          // Get the details from the URL parameters
          const urlParams = new URLSearchParams(window.location.search);
          const carName = urlParams.get('carName');
          const carColor = urlParams.get('carColor');
          const carModel = urlParams.get('carModel');
          const carPrice = urlParams.get('carPrice');
          const carid = urlParams.get('carid');

          // Use the details as needed (e.g., display them on the page)
          document.getElementById('selectedCarName').value = carName;
          document.getElementById('selectedCarColor').value = carColor;
          document.getElementById('selectedCarModel').value = carModel;
          document.getElementById('selectedCarRentperday').textContent = carPrice;
          document.getElementById('selectedCarID').value = carid;

          
          document.getElementById('selectedCarName').disabled = true;
          document.getElementById('selectedCarColor').disabled = true;
          document.getElementById('selectedCarModel').disabled = true;
          document.getElementById('restotalpayment').disabled = true;
          document.getElementById('selectedCarID').disabled = true;


      });
      
      document.addEventListener('DOMContentLoaded', function () {
          // Get the details from the URL parameters
          const urlParams = new URLSearchParams(window.location.search);
          const carPricePerDay = parseFloat(urlParams.get('carPrice')); // Assuming carPrice is passed as a float

          // Use the details as needed (e.g., display them on the page)
          document.getElementById('selectedCarRentperday').textContent = carPricePerDay +'$';

          // Add an event listener to the "Until" date input to calculate the total payment
          const returnDateInput = document.getElementById('returnDate');
          returnDateInput.addEventListener('change', calculateTotalPayment);

          // Set the minimum date for "From" to today
          const today = new Date().toISOString().split('T')[0];
          document.getElementById('pickupDate').min = today;
          document.getElementById('returnDate').min = today;

          // Add an event listener to the card number input for validation
          const cardNumberInput = document.getElementById('cardnumberinput');
          cardNumberInput.addEventListener('input', validateCardNumber);
          
          // Add an event listener to the "Valid Until" date input for validation
          const validUntilInput = document.getElementById('validuntil');
          validUntilInput.addEventListener('input', validateValidUntil);
      });

      function calculateTotalPayment() {
          const pickupDate = new Date(document.getElementById('pickupDate').value);
          const returnDate = new Date(document.getElementById('returnDate').value);
          const carPricePerDay = parseFloat(document.getElementById('selectedCarRentperday').textContent);

          if (pickupDate >= returnDate) {
              alert('Please choose a valid "From" and "Until" date.');
              return;
          }

          const today = new Date();
          if (pickupDate < today) {
              alert('Please choose a "From" date that is today or in the future.');
              return;
          }

          if (returnDate <= pickupDate) {
              alert('Please choose a "Until" date that is after the "From" date.');
              return;
          }

          const timeDifference = returnDate.getTime() - pickupDate.getTime();
          const numberOfDays = Math.ceil(timeDifference / (1000 * 3600 * 24));

          document.getElementById('resnumofdays').textContent = numberOfDays;

          const totalPayment = numberOfDays * carPricePerDay;

          document.getElementById('restotalpayment').disabled = false;
          document.getElementById('restotalpayment').value = totalPayment;
          document.getElementById('restotalpayment').disabled = true;

      }

      function validateCardNumber() {
          const cardNumberInput = document.getElementById('cardnumberinput');
          const cardNumber = cardNumberInput.value.replace(/\s/g, ''); // Remove spaces

          // Validate if the card number has at least 16 digits
          if (cardNumber.length < 16) {
            document.getElementById('CardError').textContent = "Please Enter a valid card number";
            document.getElementById('CardError').style = "color:red;";

          }else{
            document.getElementById('CardError').textContent = " ";
          }
      }

      function validateValidUntil() {
          const validUntilInput = document.getElementById('validuntil');
          const validUntilDate = new Date(validUntilInput.value);

          // Validate if the "Valid Until" date is not in the past
          const today = new Date();
          if (validUntilDate < today) {
              alert('Please choose a "Valid Until" date that is today or in the future.');
          }
      }

      function goBack() {
        event.preventDefault();
        window.history.back();
      }
      
      function kik(){
        document.getElementById('restotalpayment').disabled = false;
        document.getElementById('selectedCarID').disabled = false;

      }
  </script>

</body>

</html>