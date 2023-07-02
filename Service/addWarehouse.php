<?php

include "../config/dbconnection.php";

if (isset($_POST['submit'])) {

    $name = $_POST['name'];

    $location = $_POST['location'];

    $sql = "INSERT INTO `warehouses`(`name`, `location`) VALUES ('$name','$location')";

    $result = $conn->query($sql);

    if ($result === TRUE) {

        header("Location: ../View/warehouse.php");

        exit();

    }

    echo "Error:". $sql . "<br>". $conn->error;

    $conn->close();

}

?>