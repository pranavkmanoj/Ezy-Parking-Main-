<?php
session_start();
include('includes/dbconnection.php');

// Query to fetch booking and user details, including Location
$query = "
    SELECT 
        tblbookings.BookingID,
        tblbookings.VehicleNumber,
        tblbookings.StartDateTime,
        tblbookings.EndDateTime,
        tblbookings.ParkingNumber,
        tblbookings.BookingStatus,
        tblbookings.Location,
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
    <?php include_once('includes/sidebar.php');?>

    <!-- Left Panel -->

    <!-- Right Panel -->
    <?php include_once('includes/header.php');?>

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
                    <th>Location</th>
                    <th>User Name</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>Print</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr id='row_{$row['BookingID']}'>
                            <td>{$row['BookingID']}</td>
                            <td>{$row['VehicleNumber']}</td>
                            <td>{$row['StartDateTime']}</td>
                            <td>{$row['EndDateTime']}</td>
                            <td>{$row['ParkingNumber']}</td>
                            <td>{$row['BookingStatus']}</td>
                            <td>{$row['Location']}</td>
                            <td>{$row['FirstName']} {$row['LastName']}</td>
                            <td>{$row['MobileNumber']}</td>
                            <td>{$row['Email']}</td>
                            <td><button class='btn btn-primary' onclick='printBookingDetails({$row['BookingID']})'>Print</button></td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>No bookings found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php include_once('includes/footer.php');?>

    <script>
        function printBookingDetails(bookingID) {
            var row = document.getElementById("row_" + bookingID);
            var content = `
                <html>
                    <head>
                        <title>Booking Details</title>
                        <style>
                            body { font-family: Arial, sans-serif; }
                            table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
                            th, td { padding: 10px; text-align: left; border: 1px solid #ddd; }
                        </style>
                    </head>
                    <body>
                        <h2>Booking Details for Booking ID: ${bookingID}</h2>
                        <table>
                            <tr><th>Booking ID</th><td>${row.cells[0].innerText}</td></tr>
                            <tr><th>Vehicle Number</th><td>${row.cells[1].innerText}</td></tr>
                            <tr><th>Start Date & Time</th><td>${row.cells[2].innerText}</td></tr>
                            <tr><th>End Date & Time</th><td>${row.cells[3].innerText}</td></tr>
                            <tr><th>Parking Number</th><td>${row.cells[4].innerText}</td></tr>
                            <tr><th>Status</th><td>${row.cells[5].innerText}</td></tr>
                            <tr><th>Location</th><td>${row.cells[6].innerText}</td></tr>
                            <tr><th>User Name</th><td>${row.cells[7].innerText}</td></tr>
                            <tr><th>Mobile Number</th><td>${row.cells[8].innerText}</td></tr>
                            <tr><th>Email</th><td>${row.cells[9].innerText}</td></tr>
                        </table>
                        <button onclick="window.print()">Print this page</button>
                    </body>
                </html>
            `;
            
            var printWindow = window.open('', '', 'width=800,height=600');
            printWindow.document.write(content);
            printWindow.document.close();
            printWindow.focus();
        }
    </script>
</body>
</html>
