<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Search</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Car Rental Search</h1>
        <input type="text" id="searchInput" placeholder="Search for cars">
        <ul id="results"></ul>
    </div>
    <script src="script.js"></script>
</body>
</html>



<style>
        
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    cursor: pointer;
}

li:hover {
    background-color: #f9f9f9;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const resultsContainer = document.getElementById('results');

    searchInput.addEventListener('input', function () {
        const searchTerm = searchInput.value.toLowerCase();

        // You would typically make an API request to the backend here
        // and update the results based on the response.

        // For simplicity, let's assume we have a static array of cars.
        const cars = ['Toyota Camry', 'Honda Accord', 'Ford Mustang', 'Chevrolet Malibu'];

        const filteredCars = cars.filter(car => car.toLowerCase().includes(searchTerm));

        displayResults(filteredCars);
    });

    function displayResults(results) {
        resultsContainer.innerHTML = '';

        if (results.length === 0) {
            resultsContainer.innerHTML = '<li>No results found</li>';
        } else {
            results.forEach(result => {
                const li = document.createElement('li');
                li.textContent = result;
                resultsContainer.appendChild(li);
            });
        }
    }
});
Backend (Node.js with Express);
server.js;

javascript
C
const express = require('express');
const app = express();
const port = 3000;

app.use(express.static('public'));

app.listen(port, () => {
    console.log(`Server is running at http://localhost:${port}`);
});
</script>
