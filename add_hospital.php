<?php
include '../db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Hospital</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="navbar">Add Hospital</div>

<div class="content">

<form method="POST">
    <h3>Add Hospital</h3>

    <input type="text" name="name" placeholder="Hospital Name" required>
    <input type="text" name="address" placeholder="Address" required>
    <input type="text" name="phone" placeholder="Phone" required>

    <button name="submit">Add Hospital</button>
</form>

<?php
if(isset($_POST['submit'])){
    
    // Insert into Hospital table
    mysqli_query($conn,"INSERT INTO Hospital(Name, Address)
    VALUES('{$_POST['name']}','{$_POST['address']}')");

    // Get ID
    $id = mysqli_insert_id($conn);

    // Insert phone
    mysqli_query($conn,"INSERT INTO Hospital_Phone(hospital_id, phno)
    VALUES('$id','{$_POST['phone']}')");

    echo "<p>Hospital Added Successfully</p>";
}
?>

</div>

</body>
</html>