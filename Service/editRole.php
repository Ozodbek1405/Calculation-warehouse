<?php

include "../config/dbconnection.php";

if (isset($_POST['update'])) {

    $role_id = $_POST['role_id'];

    $name = $_POST['name'];

    $sql = "UPDATE `roles` SET `name`='$name' WHERE `role_id`='$role_id'";

    $result = $conn->query($sql);

    if ($result === TRUE) {

        header("Location: ../View/roles.php");

        exit();

    }

    echo "Error:" . $sql . "<br>" . $conn->error;

}