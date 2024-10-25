<?php
// Database credentials
$servername = "localhost"; // Your server name
$username = "root";        // Your username
$password = "123456";            // Your password
$dbname = "test"; // Your database name

// Create a connection to MySQL
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to generate a random 10-character alphanumeric code
function generateRandomAlphanumericCode($length = 12) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Function to check if the code is unique in the database
function isCodeUnique($code, $conn) {
    $query = "SELECT * FROM codes WHERE code = '$code'";
    $result = mysqli_query($conn, $query);
    return (mysqli_num_rows($result) === 0); // Returns true if code is unique
}

// Function to insert the unique code into the database
function insertCodeIntoDatabase($code, $conn) {
    $query = "INSERT INTO codes (code) VALUES ('$code')";
    if (mysqli_query($conn, $query)) {
        echo "New code inserted successfully: $code";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Generate and insert unique code
do {
    $randomCode = generateRandomAlphanumericCode();
} while (!isCodeUnique($randomCode, $conn)); // Loop until a unique code is found

// Insert the unique code into the database
insertCodeIntoDatabase($randomCode, $conn);

// Close the connection
mysqli_close($conn);
?>
