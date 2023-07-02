<?php

session_start();

include "../config/dbconnection.php";

if (isset($_POST['user_name'], $_POST['password'])) {

    function validate($data){

        $data = trim($data);

        $data = stripslashes($data);

        return htmlspecialchars($data);

    }

    $uname = validate($_POST['user_name']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {

        header("Location: ../index.php?error=User Name is required");

        exit();

    }

    if(empty($pass)){

        header("Location: ../index.php?error=Password is required");

        exit();

    }

    $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);

        if ($row['user_name'] === $uname && $row['password'] === $pass) {

            echo "Logged in!";

            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['role_id'] = $row['role_id'];

            header("Location: ../View/dashboard.php");

            exit();

        }

        header("Location: ../index.php?error=Incorrect User name or password");

        exit();

    }

    header("Location: ../index.php?error=Incorrect User name or password");

    exit();

}

header("Location: ../index.php");

exit();