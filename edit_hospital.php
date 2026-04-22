<?php
include '../db.php';

// Fetch existing data
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $res = mysqli_query($conn, "SELECT * FROM Hospital WHERE hospital_id='$id'");
    $row = mysqli_fetch_assoc($res);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Hospital</title>
    <style>
        form {
            width: 40%;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            text-align: center;
        }
        input {
            width: 90%;
            padding: 8px;
            margin: 10px 0;
        }
        button {
            padding: 10px 20px;
            background-color: #c0392b;
            color: white;
            border: none;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Edit Hospital</h2>

<form method="POST">
    <input type="hidden" name="id" value="<?php echo $row['hospital_id']; ?>">

    <label>Name:</label><br>
    <input type="text" name="name" value="<?php echo $row['Name']; ?>" required>

    <label>Address:</label><br>
    <input type="text" name="address" value="<?php echo $row['Address']; ?>" required>

    <br>
    <button type="submit" name="update">Update</button>
</form>

</body>
</html>

<?php
// Update query
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];

    $query = "UPDATE Hospital 
              SET Name='$name', Address='$address' 
              WHERE hospital_id='$id'";

    if(mysqli_query($conn, $query)){
        header("Location: view_hospital.php?msg=updated");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>