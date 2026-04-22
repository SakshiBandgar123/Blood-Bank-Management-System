<?php
include '../db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Manager</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="navbar">Manager List</div>

<div class="content">

<h2>All Managers</h2>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Blood Bank</th>
    <th>Phone</th>
</tr>

<?php
// JOIN Manager + BloodBank + Phone
$res = mysqli_query($conn,"SELECT m.*, b.Name AS bank_name, p.phno
FROM BloodBankManager m
JOIN BloodBank b ON m.bank_id = b.bank_id
LEFT JOIN Manager_Phone p ON m.emp_id = p.emp_id");

while($row = mysqli_fetch_assoc($res)){
    echo "<tr>
        <td>{$row['emp_id']}</td>
        <td>{$row['Name']}</td>
        <td>{$row['bank_name']}</td>
        <td>{$row['phno']}</td>
    </tr>";
}
?>

</table>

</div>

</body>
</html>