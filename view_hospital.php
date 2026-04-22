<?php
include '../db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Hospital</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            text-align: center;
        }
        th, td {
            border: 1px solid #c0392b;
            padding: 10px;
        }
        th {
            background-color: #c0392b;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            font-weight: bold;
        }
        .edit-btn { color: blue; }
        .delete-btn { color: red; }
    </style>
</head>
<body>

<div class="navbar">Hospital List</div>

<div class="content">

<h2>All Hospitals</h2>

<?php
// Messages
if(isset($_GET['msg'])){
    if($_GET['msg'] == 'deleted'){
        echo "<p style='color:green; text-align:center;'>Hospital deleted successfully!</p>";
    }
    if($_GET['msg'] == 'updated'){
        echo "<p style='color:green; text-align:center;'>Hospital updated successfully!</p>";
    }
}

// Fetch hospital + phone
$res = mysqli_query($conn,"
SELECT h.*, p.phno 
FROM Hospital h
LEFT JOIN Hospital_Phone p 
ON h.hospital_id = p.hospital_id
");
?>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Address</th>
    <th>Phone</th>
    <th>Action</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($res)){
    echo "<tr>
        <td>{$row['hospital_id']}</td>
        <td>{$row['Name']}</td>
        <td>{$row['Address']}</td>
        <td>{$row['phno']}</td>
        <td>
            <a href='edit_hospital.php?id={$row['hospital_id']}' class='edit-btn'>Edit</a> |
            <a href='delete_hospital.php?id={$row['hospital_id']}' 
               class='delete-btn'
               onclick='return confirm(\"Are you sure?\");'>
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