<?php
/**
 * Donation Submission Handler
 * 
 * This script processes donation form submissions by:
 * 1. Storing donor information in the database
 * 2. Redirecting to PayPal for payment processing
 * 
 * NOTE: This code has security vulnerabilities (SQL injection, exposed credentials)
 * that should be addressed before production use.
 */

// Database connection credentials
// WARNING: These should be stored in environment variables or a separate config file
$servername = "localhost";
$username = "bayron3";
$password = "Bayron93";
$dbname = "FranklinFC";

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve donor information from POST request
$name = $_POST['inputname'];
$email = $_POST['inputEmail4'];
$Occupation = $_POST['inputOccupation'];
$Employer = $_POST['inputEmployment'];
$Address = $_POST['inputAddress'];
$City = $_POST['inputCity'];
$State = $_POST['inputState'];
$Zip = $_POST['inputZip'];
$agree_terms = $_POST['gridCheck'];

// Prepare SQL insert statement
// WARNING: This is vulnerable to SQL injection. Use prepared statements instead.
$sql = sprintf(
    "INSERT INTO Donators (Name, Email, Occupation, Employer, Address, City, State, Zip, agree_terms) 
     VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
    $name,
    $email,
    $Occupation,
    $Employer,
    $Address,
    $City,
    $State,
    $Zip,
    1
);

// Execute query and redirect to PayPal if successful
if ($conn->query($sql) === TRUE) {
    // Redirect to PayPal donation page
    header("Location: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=V7ZEHKWKCJABY&source=url");
    
    // Ensure no further code execution after redirect
    exit;
} else {
    // TODO: Handle database insertion errors
    // Consider logging the error and showing a user-friendly error page
}

// Close database connection
$conn->close();
?>


