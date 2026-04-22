<?php
include '../db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Manager</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="navbar">Add Manager</div>

<div class="content">

<form method="POST">
    <h3>Add Manager</h3>

    <input type="text" name="name" placeholder="Name" required>

    <label>Select Blood Bank:</label>
    <select name="bank_id" required>
        <?php
        $res = mysqli_query($conn,"SELECT * FROM BloodBank");
        while($row = mysqli_fetch_assoc($res)){
            echo "<option value='{$row['bank_id']}'>{$row['Name']}</option>";
        }
        ?>
    </select>

    <input type="text" name="phone" placeholder="Phone" required>

    <button name="submit">Add Manager</button>
</form>

<?php
if(isset($_POST['submit'])){
    
    // Insert into Manager
    mysqli_query($conn,"INSERT INTO BloodBankManager(Name, bank_id)
    VALUES('{$_POST['name']}','{$_POST['bank_id']}')");

    // Get ID
    $id = mysqli_insert_id($conn);

    // Insert phone
    mysqli_query($conn,"INSERT INTO Manager_Phone(emp_id, phno)
    VALUES('$id','{$_POST['phone']}')");

    echo "<p>Manager Added Successfully</p>";
}
?>

</div>

</body>
</html>