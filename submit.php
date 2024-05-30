<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "csa";
    $password = "simla@csa";
    $dbname = "task";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $first_name = $_POST["firstName"];
    $last_name = $_POST["lastName"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone"];
    $password = $_POST["password"];

    // Insert data into table
    $sql = "INSERT INTO users (first_name, last_name, email, phone_no, password) VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<h1 style='text-align:center; color:brown;'>Welcome". $first_name ." ". $last_name .",</p>";
        echo "<h1 style='text-align:center; color:brown;'>your account has been created. Details have been sent to your registered email. </h1>";
        echo "<a style='text-align:center;' href='login.php'>Click here to login</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
