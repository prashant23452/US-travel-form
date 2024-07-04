<?php
    $insert=false;
    if(isset($_POST['name'])){
        // Set connection variables
    $server="localhost";
    $username="root";
    $password="";
       // create a database connection
    $con= mysqli_connect($server, $username, $password);
       // Check for connection success
    if(!$con){
        die("Connection with database failed due to" .mysqli_connect_error());
    }
    //echo "sucess connecting to the db";

    // collect post variables
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $desc=$_POST['desc'];
    $sql="INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name',
     '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    //echo $sql;
   //Execute the query
    if($con->query($sql)==true){
       //echo"Sucessfully inserted";

       //flag for sucessful insertion
       $insert=true;
    }
    else{
       echo "ERROR: $sql <br> $con->error";
    }
    

    //Close the database connection 
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="nsec garia.jpeg" alt="IIT GARIA">
    <div class="container">
        <h3>Welcome to IIT Garia US Trip form</h3>
        <p>Enter your details and submit this form to confirm yoour registration in the trip </p>
        <?php
        if($insert==true){
            echo "<p class='submitMsg'>Thanks for submitting your form. We are happy you to see you joining us for the US trip</p>" ; 
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your gender">
            <input type="text" name="email" id="email" placeholder="Enter Your Emaail">
            <input type="text" name="phone" id="phone" placeholder="Enter Your Phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information area"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form>
        
    </div>
    <script src="script.js"></script>
    
    
</body>
</html>