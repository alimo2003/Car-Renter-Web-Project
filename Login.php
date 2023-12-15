        <?php
        $conn = mysqli_connect("localhost", "root", "2003199", "backend");
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. ". mysqli_connect_error());
        }
         
        $Password =  $_REQUEST['password'];
        $email = $_REQUEST['email'];
         
        $sql2= "SELECT * FROM accounts WHERE email= $email AND dassword= $Password";
        $res=mysqli_query($conn, $sql2);

        if($res!==0){
            echo "<h3>Login Successful</h3>"; 
        }else{
            echo "<h3> Invalid email or password</h3>";
        }
       
           
        // Close connection
        mysqli_close($conn);
        ?>