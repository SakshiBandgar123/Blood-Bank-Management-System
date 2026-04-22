<?php
include '../db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Blood Units</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="navbar">Blood Units List</div>

<div class="content">

<h2>All Blood Units</h2>

<?php
if(isset($_GET['msg']) && $_GET['msg'] == 'deleted'){
    echo "<p style='color:green; text-align:center;'>Blood Unit deleted successfully!</p>";
}

$res = mysqli_query($conn,"SELECT * FROM BloodUnits");
?>

<table border="1" style="width:80%; margin:auto; text-align:center; border-collapse:collapse;">
<tr>
    <th>Unit ID</th>
    <th>Blood Group</th>
    <th>Cost</th>
    
    <th>Action</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($res)){
    echo "<tr>
        <td>{$row['unit_id']}</td>
        <td>{$row['Blood_group']}</td>
        <td>{$row['Cost']}</td>
        
        <td>
            <a href='delete_unit.php?id={$row['unit_id']}'
               onclick='return confirm(\"Are you sure you want to delete this unit?\");'
               style='color:red; font-weight:bold;'>
               Delete
            </a>
        </td>
    </tr>";
}
?>

</table>

</div>

</body>
</html>