<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['vpmsaid']) == 0) {
    header('location:logout.php');
} else {
    // For deleting vehicle records
    if (isset($_GET['del'])) {
        $vehicleId = intval($_GET['del']);
        
        // Use prepared statements for deletion
        $stmt = $con->prepare("DELETE FROM tblvehicle WHERE ID = ?");
        $stmt->bind_param("i", $vehicleId);

        if ($stmt->execute()) {
            echo "<script>alert('Vehicle record deleted successfully');</script>";
        } else {
            echo "<script>alert('Error: Could not delete vehicle record');</script>";
        }
        $stmt->close();
        
        echo "<script>window.location.href='manage-incomingvehicle.php'</script>";
    }
?>
<!doctype html>
<html lang="en">
<head>
    <title>VPMS - Manage Incoming Vehicle</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Sidebar and Header -->
    <?php include_once('includes/sidebar.php'); ?>
    <?php include_once('includes/header.php'); ?>

    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="dashboard.php">Dashboard</a></li>
                                <li><a href="manage-incomingvehicle.php">Manage Vehicle</a></li>
                                <li class="active">Manage Incoming Vehicle</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Manage Incoming Vehicle</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>Parking Number</th>
                                        <th>Owner Name</th>
                                        <th>Vehicle Reg Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Fetch only active/unprocessed vehicles
                                    $query = "SELECT * FROM tblvehicle WHERE Status = ''";
                                    $result = mysqli_query($con, $query);
                                    $cnt = 1;

                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo $row['ParkingNumber']; ?></td>
                                            <td><?php echo $row['OwnerName']; ?></td>
                                            <td><?php echo $row['RegistrationNumber']; ?></td>
                                            <td>
                                                <a href="view-incomingvehicle-detail.php?viewid=<?php echo $row['ID']; ?>" class="btn btn-primary">View</a>
                                                <a href="print.php?vid=<?php echo $row['ID']; ?>" target="_blank" class="btn btn-warning">Print</a>
                                                <a href="manage-incomingvehicle.php?del=<?php echo $row['ID']; ?>" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                                            </td>
                                        </tr>
                                    <?php 
                                        $cnt++;
                                    } 
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    <!-- Footer -->
    <?php include_once('includes/footer.php'); ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
<?php } ?>
