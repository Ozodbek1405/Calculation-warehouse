<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <title>Calculation warehouse - login page</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-8 login-box">
            <div class="col-lg-12 login-key">
                <i class="fa fa-key" aria-hidden="true"></i>
            </div>
            <div class="col-lg-12 login-title">
                ADMIN PANEL
            </div>

            <div class="col-lg-12 login-form">
                <div class="col-lg-12 login-form">
                    <form action="Service/login.php" method="post">
                        <div class="form-group">
                            <label class="form-control-label">USERNAME</label>
                            <input type="text" class="form-control" name="user_name">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">PASSWORD</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <div class="col-lg-12">
                            <div class="col-lg-6 login-btm login-text">
                                <?php if (isset($_GET['error'])) { ?>
                                    <p class="error"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-lg-6 login-btm login-button">
                                <button type="submit" class="btn btn-outline-primary">LOGIN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </div>

</body>
</html>