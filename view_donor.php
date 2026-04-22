<?php
include '../db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Donor</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="navbar">Donor List</div>

<div class="content">

<h2>All Donors</h2>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Gender</th>
    <th>Address</th>
    <th>DOB</th>
    <th>Phone</th>
</tr>

<?php
// JOIN Donor + Donor_Phones

$res = mysqli_query($conn,"SELECT d.*, p.phno 
FROM Donor d
LEFT JOIN Donor_Phone p ON d.D_ID = p.D_ID
");

while($row = mysqli_fetch_assoc($res)){
    echo "<tr>
        <td>{$row['D_ID']}</td>
        <td>{$row['Name']}</td>
        <td>{$row['Gender']}</td>
        <td>{$row['Address']}</td>
        <td>{$row['DOB']}</td>
        <td>{$row['phno']}</td>
    </tr>";
}
?>

</table>

</div>

</body>
</html>