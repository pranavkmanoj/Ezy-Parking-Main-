<?php
session_start();
include('includes/dbconnection.php');

// Query to fetch booking and user details
$query = "
    SELECT 
        tblbookings.BookingID,
        tblbookings.VehicleNumber,
        tblbookings.StartDateTime,
        tblbookings.EndDateTime,
        tblbookings.ParkingNumber,
        tblbookings.BookingStatus,
        tblregusers.FirstName,
        tblregusers.LastName,
        tblregusers.MobileNumber,
        tblregusers.Email
    FROM 
        tblbookings
    INNER JOIN 
        tblregusers ON tblbookings.UserID = tblregusers.ID
    ORDER BY 
        tblbookings.BookingID DESC
";

$result = $con->query($query);

// Check if form has been submitted to update the booking status
if (isset($_POST['update_booking'])) {
    $booking_id = $_POST['booking_id'];
    $new_status = $_POST['status'];

    // Validate input values
    if (empty($booking_id) || empty($new_status)) {
        echo "<script>alert('Please fill in all fields before submitting.');</script>";
    } else {
        // Update booking status in the database
        $update_query = "UPDATE tblbookings SET BookingStatus = ? WHERE BookingID = ?";
        $stmt = $con->prepare($update_query);
        $stmt->bind_param("si", $new_status, $booking_id);

        if ($stmt->execute()) {
            echo "<script>alert('Booking status updated successfully!');</script>";
        } else {
            echo "<script>alert('Error updating booking.');</script>"; // Show error alert if something goes wrong
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>View Vehicle Bookings</title>
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
    <?php include_once('includes/sidebar.php'); ?>

    <!-- Right Panel -->
    <?php include_once('includes/header.php'); ?>

    <div class="container">
        <h2 class="mt-5">Vehicle Booking Details</h2>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Vehicle Number</th>
                    <th>Start Date & Time</th>
                    <th>End Date & Time</th>
                    <th>Parking Number</th>
                    <th>Status</th>
                    <th>User Name</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['BookingID']}</td>
                            <td>{$row['VehicleNumber']}</td>
                            <td>{$row['StartDateTime']}</td>
                            <td>{$row['EndDateTime']}</td>
                            <td>{$row['ParkingNumber']}</td>
                            <td>{$row['BookingStatus']}</td>
                            <td>{$row['FirstName']} {$row['LastName']}</td>
                            <td>{$row['MobileNumber']}</td>
                            <td>{$row['Email']}</td>
                            <td>
                                <form method='POST' action=''>
                                    <input type='hidden' name='booking_id' value='{$row['BookingID']}'>
                                    <select name='status' class='form-control'>
                                        <option value='Pending' " . ($row['BookingStatus'] == 'Pending' ? 'selected' : '') . ">Pending</option>
                                        <option value='Confirmed' " . ($row['BookingStatus'] == 'Confirmed' ? 'selected' : '') . ">Confirmed</option>
                                        <option value='Cancelled' " . ($row['BookingStatus'] == 'Cancelled' ? 'selected' : '') . ">Cancelled</option>
                                    </select>
                                    <button type='submit' name='update_booking' class='btn btn-success mt-2'>Update</button>
                                </form>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No bookings found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php include_once('includes/footer.php'); ?>
</body>
</html>
