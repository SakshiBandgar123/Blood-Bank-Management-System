<?php
include '../db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Receptionist</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="navbar">Receptionist List</div>

<div class="content">

<h2>All Receptionists</h2>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Address</th>
    <th>Phone</th>
</tr>

<?php
// JOIN Receptionist + Receptionist_Phone
$res = mysqli_query($conn,"SELECT r.*, p.phno 
FROM Receptionist r
LEFT JOIN Receptionist_Phone p ON r.emp_id = p.emp_id");

while($row = mysqli_fetch_assoc($res)){
    echo "<tr>
        <td>{$row['emp_id']}</td>
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