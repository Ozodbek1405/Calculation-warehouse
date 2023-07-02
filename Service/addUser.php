<?php

include "../config/dbconnection.php";

if (isset($_POST['submit'])) {

    $name = $_POST['user_name'];
    $role_id = $_POST['role_id'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `users`(`user_name`, `role_id`, `password`)VALUES ('$name','$role_id','$password')";
    $result = $conn->query($sql);

    if ($result === TRUE) {

        header("Location: ../View/users.php");

        exit();

    }

    echo "Error:". $sql . "<br>". $conn->error;

    $conn->close();

}

?>