<?php

include "../config/dbconnection.php";

if (isset($_GET['id'])) {

    $warehouse_id = $_GET['id'];

    $sql = "DELETE FROM `warehouses` WHERE `id`='$warehouse_id'";

    $result = $conn->query($sql);

    if ($result === TRUE) {

        header("Location: ../View/warehouse.php");

        exit();

    }

    echo "Error:" . $sql . "<br>" . $conn->error;

}

?>