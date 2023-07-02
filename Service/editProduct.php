<?php

include "../config/dbconnection.php";

if (isset($_POST['update'])) {

    $product_id = $_POST['id'];

    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $warehouse_id = $_POST['warehouse_id'];
    $expiration_date = $_POST['expiration_date'];
    $quantity = $_POST['quantity'];


    $sql = "UPDATE `products` SET `name`='$name',`category_id`='$category_id',`warehouse_id`='$warehouse_id',`expiration_date`='$expiration_date',`quantity`='$quantity' WHERE `id`='$product_id'";

    $result = $conn->query($sql);

    if ($result === TRUE) {

        header("Location: ../View/products.php");

        exit();

    }

    echo "Error:" . $sql . "<br>" . $conn->error;

}