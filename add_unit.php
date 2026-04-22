<?php
include '../db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Blood Unit</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="navbar">Add Blood Unit</div>

<div class="content">

<form method="POST">
    <h3>Add Blood Unit</h3>

    <input type="text" name="blood_group" placeholder="Blood Group (A+, B+, etc)" required>
    <input type="number" name="cost" placeholder="Cost" required>

    <label>Select Donor:</label>
    <select name="did" required>
        <?php
        // Fetch donors
        $res = mysqli_query($conn,"SELECT * FROM Donor");
        while($row = mysqli_fetch_assoc($res)){
            echo "<option value='{$row['D_ID']}'>{$row['Name']}</option>";
        }
        ?>
    </select>

    <button name="submit">Add Unit</button>
</form>

<?php
if(isset($_POST['submit'])){
    
    mysqli_query($conn,"INSERT INTO BloodUnits(Blood_group, Cost, D_ID)
    VALUES('{$_POST['blood_group']}','{$_POST['cost']}','{$_POST['did']}')");

    echo "<p>Blood Unit Added Successfully</p>";
}
?>

</div>

</body>
</html>