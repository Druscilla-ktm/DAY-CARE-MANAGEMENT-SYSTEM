<?php
$conn = new mysqli("localhost", "root", "", "DAYCAREPRO");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$firstname = isset($_POST["FirstName"]) ? trim($_POST["FirstName"]) : null;
$lastname = isset($_POST["LastName"]) ? trim($_POST["LastName"]) : null;
$email = isset($_POST["Email"]) ? trim($_POST["Email"]) : null;
$address = isset($_POST["Location"]) ? trim($_POST["Location"]) : null;
$contact = isset($_POST["Contact"]) ? trim($_POST["Contact"]) : null;

if (!$firstname || !$lastname || !$email || !$address || !$contact) {
    die("All fields are required.");
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO PARENT (FirstName, LastName, Email, Location, Contact) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $firstname, $lastname, $email, $address, $contact);

// Execute and check result
if ($stmt->execute()) {
    echo "New parent added successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
