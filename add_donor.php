<?php
include '../db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Donor</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="navbar">Add Donor</div>

<div class="content">

<form method="POST">
    <h3>Add Donor</h3>

    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="gender" placeholder="Gender" required>
    <input type="text" name="address" placeholder="Address" required>
    <input type="date" name="dob" required>
    <input type="text" name="phone" placeholder="Phone" required>

    <button name="submit">Add Donor</button>
</form>

<?php
if(isset($_POST['submit'])){
    
    // Insert into Donor table
    mysqli_query($conn,"INSERT INTO Donor(Name,Gender,Address,DOB)
    VALUES('{$_POST['name']}','{$_POST['gender']}','{$_POST['address']}','{$_POST['dob']}')");

    // Get last inserted ID
    $id = mysqli_insert_id($conn);

    // Insert phone into Donor_Phone
    mysqli_query($conn,"INSERT INTO Donor_Phone(D_ID, phno)
    VALUES('$id','{$_POST['phone']}')");

    echo "<p>Donor Added Successfully</p>";
}
?>

</div>

</body>
</html>