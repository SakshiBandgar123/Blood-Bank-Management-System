<?php
include '../db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Blood Bank</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="navbar">Add Blood Bank</div>

<div class="content">

<form method="POST">
    <h3>Add Blood Bank</h3>

    <input type="text" name="name" placeholder="Bank Name" required>
    <input type="text" name="address" placeholder="Address" required>
    <input type="text" name="phone" placeholder="Phone" required>

    <button name="submit">Add Bank</button>
</form>

<?php
if(isset($_POST['submit'])){
    
    // Insert into BloodBank
    mysqli_query($conn,"INSERT INTO BloodBank(Name, Address)
    VALUES('{$_POST['name']}','{$_POST['address']}')");

    // Get last inserted ID
    $id = mysqli_insert_id($conn);

    // Insert into BloodBank_Phone
    mysqli_query($conn,"INSERT INTO BloodBank_Phone(bank_id, phno)
    VALUES('$id','{$_POST['phone']}')");

    echo "<p>Blood Bank Added Successfully</p>";
}
?>

</div>

</body>
</html>