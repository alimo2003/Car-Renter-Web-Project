
<?php
 
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "2003199", "backend");
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking all 5 values from the form data(input)
        $first_name =  $_REQUEST['fname'];
        $last_name = $_REQUEST['lname'];
        $password =  $_REQUEST['password'];
        $date = $_REQUEST['date'];
        $email = $_REQUEST['email'];
        $phonenumber = $_REQUEST['phonenumber'];
         
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO accounts  VALUES ('$first_name', 
            '$last_name','$email','$password','$phonenumber','$date',TRUE)";
         
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>"; 
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
         
        // Close connection
        mysqli_close($conn);
        ?>