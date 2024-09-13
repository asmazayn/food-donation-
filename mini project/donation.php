<?php
// Database connection
$conn = new mysqli('localhost:3310', 'root', '', 'FoodDonationdb');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $foodType = $_POST['food_type'];
    $quantity = $_POST['quantity'];
    $donationDate = $_POST['date'];
    $donationTime = $_POST['time'];

    // Insert donation data into the database
    $stmt = $conn->prepare("INSERT INTO donations (name, contact, food_type, quantity, donation_date, donation_time) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $contact, $foodType, $quantity, $donationDate, $donationTime);

    if ($stmt->execute()) {
        echo "Donation submitted successfully.";
        header("Location: thank_you.html"); // Redirect to thank you page after submission
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
