<?php

include "../config/dbconnection.php";

if (isset($_POST['update'])) {

    $category_id = $_POST['id'];

    $name = $_POST['name'];

        $sql = "UPDATE `categories` SET `name`='$name' WHERE `id`='$category_id'";

    $result = $conn->query($sql);

    if ($result === TRUE) {

        header("Location: ../View/categories.php");

        exit();

    }

    echo "Error:" . $sql . "<br>" . $conn->error;

}