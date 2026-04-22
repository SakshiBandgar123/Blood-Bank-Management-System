<?php
include '../db.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // DELETE using correct column name
    $query = "DELETE FROM BloodUnits WHERE unit_id = '$id'";
    $result = mysqli_query($conn, $query);

    if($result){
        header("Location: view_units.php?msg=deleted");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "No ID received!";
}
?>