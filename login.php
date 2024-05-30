<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    //db connection details
    $servername = "localhost";
    $username = "csa";
    $db_password = "simla@csa";
    $dbname = "task";

    // Create connection
    $conn = new mysqli($servername, $username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Example query to check if the user exists with the provided email and password
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    if ($result = mysqli_query($conn, $query)) {
        if (mysqli_num_rows($result) == 1) {
            // get first name and last name
            $row = mysqli_fetch_assoc($result);
            $first_name = $row["first_name"];
            $last_name = $row["last_name"];

            // Display a welcome message
            echo "Welcome". $first_name. " " .$last_name;
        } else {
            // Invalid credentials
            echo "Email or Password Error";
        }
    } else {
        // Error executing the query
        echo "Error: " . mysqli_error($conn);
    }

    // Close the db connection
    mysqli_close($conn);
}
?>
