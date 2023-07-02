<?php

include "../config/dbconnection.php";

if (isset($_GET['role_id'])) {

    $role_id = $_GET['role_id'];

    $sql = "DELETE FROM `roles` WHERE `role_id`='$role_id'";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        header("Location: ../View/roles.php");
        exit();
    }

    echo "Error:" . $sql . "<br>" . $conn->error;

}
