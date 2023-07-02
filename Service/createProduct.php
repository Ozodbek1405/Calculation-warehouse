<?php

include "../config/dbconnection.php";

if (isset($_POST['createProduct'])) {

    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $warehouse_id = $_POST['warehouse_id'];
    $expiration_date = $_POST['expiration_date'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO `products`(`name`, `category_id`, `warehouse_id`, `expiration_date`, `quantity`)VALUES ('$name','$category_id','$warehouse_id','$expiration_date','$quantity')";
    $result = $conn->query($sql);

    if ($result === TRUE) {

        header("Location: ../View/addProducts.php");

        exit();

    }

    echo "Error:". $sql . "<br>". $conn->error;

    $conn->close();

}

?>