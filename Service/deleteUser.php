<?php

include "../config/dbconnection.php";

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "DELETE FROM `users` WHERE `id`='$user_id'";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        header("Location: ../View/users.php");
        exit();
    }

    echo "Error:" . $sql . "<br>" . $conn->error;

}

?>