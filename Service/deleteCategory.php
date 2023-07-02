<?php

include "../config/dbconnection.php";

if (isset($_GET['id'])) {

    $category_id = $_GET['id'];

    $sql = "DELETE FROM `categories` WHERE `id`='$category_id'";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        header("Location: ../View/categories.php");
        exit();
    }

    echo "Error:" . $sql . "<br>" . $conn->error;

}

