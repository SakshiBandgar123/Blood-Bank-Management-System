<?php
include '../db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Blood Bank</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="navbar">Blood Bank List</div>

<div class="content">

<h2>All Blood Banks</h2>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Address</th>
    <th>Phone</th>
</tr>

<?php
// JOIN BloodBank + BloodBank_Phone
$res = mysqli_query($conn,"SELECT b.*, p.phno 
FROM BloodBank b
LEFT JOIN BloodBank_Phone p ON b.bank_id = p.bank_id");

while($row = mysqli_fetch_assoc($res)){
    echo "<tr>
        <td>{$row['bank_id']}</td>
        <td>{$row['Name']}</td>
        <td>{$row['Address']}</td>
        <td>{$row['phno']}</td>
    </tr>";
}
?>

</table>

</div>

</body>
</html>