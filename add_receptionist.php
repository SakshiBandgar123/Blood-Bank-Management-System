<?php
include '../db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Receptionist</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="navbar">Add Receptionist</div>

<div class="content">

<form method="POST">
    <h3>Add Receptionist</h3>

    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="address" placeholder="Address" required>
    <input type="text" name="phone" placeholder="Phone" required>

    <button name="submit">Add Receptionist</button>
</form>

<?php
if(isset($_POST['submit'])){
    
    // Insert into Receptionist
    mysqli_query($conn,"INSERT INTO Receptionist(Name, Address)
    VALUES('{$_POST['name']}','{$_POST['address']}')");

    // Get ID
    $id = mysqli_insert_id($conn);

    // Insert phone
    mysqli_query($conn,"INSERT INTO Receptionist_Phone(emp_id, phno)
    VALUES('$id','{$_POST['phone']}')");

    echo "<p>Receptionist Added Successfully</p>";
}
?>

</div>

</body>
</html>