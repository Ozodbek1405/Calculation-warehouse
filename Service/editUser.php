<?php

session_start();
include "../config/dbconnection.php";

if (isset($_POST['update'])) {

    $user_id = $_POST['id'];

    $name = $_POST['user_name'];
    $role_id = $_POST['role_id'];
    $password = $_POST['password'];

    if((int)$_SESSION['id'] === (int)$user_id){
        $_SESSION['role_id'] = $role_id;
    }

    $sql = "UPDATE `users` SET `user_name`='$name',`role_id`='$role_id',`password`='$password' WHERE `id`='$user_id'";

    $result = $conn->query($sql);


    if ($result === TRUE) {

        header("Location: ../View/users.php");

        exit();

    }

    echo "Error:" . $sql . "<br>" . $conn->error;

}