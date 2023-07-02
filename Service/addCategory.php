<?php

include "../config/dbconnection.php";

if (isset($_POST['submit'])) {

    $name = $_POST['name'];


    $sql = "INSERT INTO `categories`(`name`) VALUES ('$name')";
    $result = $conn->query($sql);

    if ($result === TRUE) {

        header("Location: ../View/categories.php");

        exit();

    }

    echo "Error:". $sql . "<br>". $conn->error;

    $conn->close();

}

?>