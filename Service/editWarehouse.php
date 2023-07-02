<?php

include "../config/dbconnection.php";

if (isset($_POST['update'])) {

    $warehouse_id = $_POST['id'];

    $name = $_POST['name'];

    $location = $_POST['location'];

    $sql = "UPDATE `warehouses` SET `name`='$name',`location`='$location' WHERE `id`='$warehouse_id'";

    $result = $conn->query($sql);

    if ($result === TRUE) {

        header("Location: ../View/warehouse.php");

        exit();

    }

    echo "Error:" . $sql . "<br>" . $conn->error;

}