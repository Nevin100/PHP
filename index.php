<?php
$insert = false;
if (isset($_POST['name'])) {
    //set connection..
    $server = "localhost";
    $username = "root";
    $password = "";

    //Creating a connection to the database
    $con = mysqli_connect($server, $username, $password);

    //check for the connection success..
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    mysqli_select_db($con, "msit_travel"); // Select the database

    //collect the post variables..
    $name = $con->real_escape_string($_POST['name']);
    $age = $con->real_escape_string($_POST['age']);
    $gender = $con->real_escape_string($_POST['gender']);
    $email = $con->real_escape_string($_POST['email']);
    $phone = $con->real_escape_string($_POST['phone']);
    $desc = $con->real_escape_string($_POST['desc']);

    //Insertion of data
    $sql = "INSERT INTO trip1 (name, age, gender, email, phone, other, date) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp())";

    if ($con->query($sql) === true) {
        //echo "Data entered successfully";
        $insert = true;
    } else {
        echo "Error: " . $con->error;
    }
    //closing the connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the travelling form </title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>

<body>
    <img class="bg" src="bg.webp" alt="MSIT Building">
    <div class="container">
        <h3>Welcome to MSIT TRAVEL FORM</h3>
        <br>
        <p>Enter your details to confirm your participiation in the trip</p>
        <br>
        <?php
        if ($insert == true) {
            echo "<p class= 'submitmsg'>Thanks for subitting this form,Really appreciated<p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter the name:">
            <input type="text" name="age" id="age" placeholder="Enter the age:">
            <input type="text" name="gender" id="gender" placeholder="Enter the gender:">
            <input type="email" name="email" id="email" placeholder="Enter the email:">
            <input type="phone" name="phone" id="phone" placeholder="Enter the phone number:">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter additional information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>

</html>