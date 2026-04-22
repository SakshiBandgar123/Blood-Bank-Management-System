<?php
session_start();
include 'db.php';

// 🔐 Login Protection
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    Blood Bank Management System

    <span style="float:right;">
        Welcome <?php echo $_SESSION['user']; ?> |
        <a href="logout.php" style="color:white;">Logout</a>
    </span>
</div>

<!-- SIDEBAR -->
<div class="sidebar">
    <a href="index.php">Dashboard</a>

    <!-- Donor -->
    <a href="donor/add_donor.php">Add Donor</a>
    <a href="donor/view_donor.php">View Donor</a>

    <!-- Blood Units -->
    <a href="blood_units/add_unit.php">Add Blood Unit</a>
    <a href="blood_units/view_units.php">View Units</a>

    <!-- Hospital -->
    <a href="hospital/add_hospital.php">Add Hospital</a>
    <a href="hospital/view_hospital.php">View Hospital</a>

    <a href="bloodbank/add_bank.php">Add Blood Bank</a>
    <a href="bloodbank/view_bank.php">View Blood Bank</a>

    <!-- Receptionist -->
    <a href="receptionist/add_receptionist.php">Add Receptionist</a>
    <a href="receptionist/view_receptionist.php">View Receptionist</a>

    <!-- Manager -->
    <a href="manager/add_manager.php">Add Manager</a>
    <a href="manager/view_manager.php">View Manager</a>

    <a href="blood_units/blood_report.php">Blood Report</a>
</div>

<!-- MAIN CONTENT -->
<div class="content">

<h2>Dashboard</h2>

<!-- CARDS -->
<div class="card">
    <h3>Total Donors</h3>
    <?php
    $res = mysqli_query($conn,"SELECT COUNT(*) as total FROM Donor");
    $row = mysqli_fetch_assoc($res);
    echo $row['total'];
    ?>
</div>

<div class="card">
    <h3>Total Blood Units</h3>
    <?php
    $res = mysqli_query($conn,"SELECT COUNT(*) as total FROM BloodUnits");
    $row = mysqli_fetch_assoc($res);
    echo $row['total'];
    ?>
</div>

<div class="card">
    <h3>Total Hospitals</h3>
    <?php
    $res = mysqli_query($conn,"SELECT COUNT(*) as total FROM Hospital");
    $row = mysqli_fetch_assoc($res);
    echo $row['total'];
    ?>
</div>

<div class="card">
    <h3>Total BloodBank</h3>
    <?php
    $res = mysqli_query($conn,"SELECT COUNT(*) as total FROM BloodBank");
    $row = mysqli_fetch_assoc($res);
    echo $row['total'];
    ?>
</div>

<div class="card">
    <h3>Total Receptionists</h3>
    <?php
    $res = mysqli_query($conn,"SELECT COUNT(*) as total FROM Receptionist");
    $row = mysqli_fetch_assoc($res);
    echo $row['total'];
    ?>
</div>

<div class="card">
    <h3>Total Managers</h3>
    <?php
    $res = mysqli_query($conn,"SELECT COUNT(*) as total FROM BloodBankManager");
    $row = mysqli_fetch_assoc($res);
    echo $row['total'];
    ?>
</div>



</div>

</body>
</html>