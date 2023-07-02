<?php

include "../config/dbconnection.php";

if (isset($_POST['submit'])) {

    $role_id = $_POST['role_id'];
    $name = $_POST['name'];

    $sql = "INSERT INTO `roles`(`name`,`role_id`) VALUES ('$name','$role_id')";
    $result = $conn->query($sql);

    if ($result === TRUE) {

        header("Location: ../View/roles.php");

        exit();

    }

    echo "Error:". $sql . "<br>". $conn->error;

    $conn->close();

}

?>