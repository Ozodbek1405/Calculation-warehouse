<?php

include "../config/dbconnection.php";

if (isset($_GET['id'])) {

    $product_id = $_GET['id'];

    $sql = "DELETE FROM `products` WHERE `id`='$product_id'";

    $result = $conn->query($sql);

    if ($result === TRUE) {

        header("Location: ../View/products.php");

        exit();

    }

    echo "Error:" . $sql . "<br>" . $conn->error;

}

?>