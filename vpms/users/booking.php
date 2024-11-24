<?php
session_start();
include('includes/dbconnection.php');

// Check if user is logged in
if (!isset($_SESSION['vpmsuid'])) {
    echo "<script>alert('Please log in to make a booking.');</script>";
    echo "<script>window.location.href = 'login.php';</script>";
    exit();
}

$user_id = $_SESSION['vpmsuid']; // Now we are sure this is set

if (isset($_POST['submit'])) {
    $vehicle_number = $_POST['vehicle_number'];
    $start_datetime = $_POST['start_datetime'];
    $end_datetime = $_POST['end_datetime'];
    $location = $_POST['location']; // Capture the selected location
    
    // Generate a random parking number between 100 and 999
    $parking_number = rand(100, 999);
    
    $status = 'Pending';

    // Prepare the SQL query
    $stmt = $con->prepare("INSERT INTO tblbookings (UserID, VehicleNumber, StartDateTime, EndDateTime, ParkingNumber, BookingStatus, Location) VALUES (?, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die("Error preparing statement: " . $con->error);
    }

    // Bind parameters
    $stmt->bind_param("issssss", $user_id, $vehicle_number, $start_datetime, $end_datetime, $parking_number, $status, $location);

    // Execute and check for errors
    if ($stmt->execute()) {
        echo "<script>alert('Booking successful! Your parking number is: $parking_number');</script>";
        echo "<script>window.location.href = 'dashboard.php';</script>"; // Redirect to dashboard after successful booking
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Book a Parking Space</title>
    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="../admin/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../admin/assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    <!-- Left Panel -->
    <?php include_once('includes/sidebar.php');?>

    <!-- Left Panel -->

    <!-- Right Panel -->
    <?php include_once('includes/header.php');?>
    <div class="container">
        <h2>Book a Parking Space</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="vehicle_number">Vehicle Number</label>
                <input type="text" class="form-control" id="vehicle_number" name="vehicle_number" required>
            </div>
            <div class="form-group">
                <label for="start_datetime">Start Date and Time</label>
                <input type="datetime-local" class="form-control" id="start_datetime" name="start_datetime" required>
            </div>
            <div class="form-group">
                <label for="end_datetime">End Date and Time</label>
                <input type="datetime-local" class="form-control" id="end_datetime" name="end_datetime" required>
            </div>
            <div class="form-group">
                <label for="location">Select Location</label>
                <select class="form-control" id="location" name="location" required>
                    <option value="Airport, Kochi">Airport, Kochi</option>
                    <option value="Kottayam Municipal Town Hall Parking, Kottayam">Municipal Town Hall Parking, Kottayam</option>
                    <option value="Technopark campus, Thiruvananthapuram">Technopark campus, Thiruvananthapuram</option>
                    <option value="Lulu Mall, Thiruvananthapuram">Lulu Mall, Thiruvananthapuram</option>
                    <option value="Starbucks,Kochi">Starbucks,Kochi</option>
                    <option value="Lulu Mall, Kochi">Lulu Mall, Kochi</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit Booking</button>
        </form>
    </div>
    <?php include_once('includes/footer.php');?>
</body>
</html>
