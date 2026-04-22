<?php
include '../db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blood Group Report</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        table {
            width: 50%;
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
        caption {
            caption-side: top;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="navbar">Blood Group Report</div>

<div class="content">



<?php
$res = mysqli_query($conn,"
    SELECT Blood_group, COUNT(*) as total
    FROM BloodUnits
    GROUP BY Blood_group
");
?>

<table>
    <caption>Blood Group Wise Count</caption>
    <tr>
        <th>Blood Group</th>
        <th>Total Units</th>
    </tr>
    <?php
    while($row = mysqli_fetch_assoc($res)){
        echo "<tr>";
        echo "<td>".$row['Blood_group']."</td>";
        echo "<td>".$row['total']."</td>";
        echo "</tr>";
    }
    ?>
</table>

</div>

</body>
</html>