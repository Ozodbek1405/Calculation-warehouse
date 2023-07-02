<?php

session_start();

if (isset($_SESSION['id'], $_SESSION['user_name'])) {
    ?>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <title>Calculation warehouse</title>
    </head>

    <body style="font-family: sans-serif">
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="dashboard.php">Calculation warehouse</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user fa-lg"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $_SESSION['user_name']; ?></h5>
                                </div>
                                <a class="dropdown-item" href="../Service/logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                <a class="active" href="dashboard.php"><i class="fas fa-home fa-lg"></i> Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="warehouse.php"><i class="fas fa-warehouse fa-lg"></i> Warehouses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="products.php"><i class="fas fa-lemon fa-lg"></i> Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="categories.php"><i class="fas fa-shopping-cart fa-lg"></i> Categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="addProducts.php"><i class="fas fa-cart-plus fa-lg"></i> Add products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="reports.php"><i class="fas fa-chart-pie fa-lg"></i> Reports</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="users.php"><i class="fas fa-user-plus fa-lg"></i> Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="roles.php"><i class="fas fa-user-tag fa-lg"></i> Roles</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <?php
        include "../config/dbconnection.php";

        $categorySql = "SELECT * FROM categories";
        $categories = mysqli_query($conn, $categorySql);
        $warehouseSql = "SELECT * FROM warehouses";
        $warehouses = $conn->query($warehouseSql);
        $sql = "SELECT * FROM products";
        $products = $conn->query($sql);
        ?>
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row m-2">
                        <h2 class="m-2"><i class="fas fa-lemon"></i> Products</h2>
                        <button type="button" data-toggle="modal" data-target="#addProduct" class="btn btn-success m-1"><i class="fas fa-plus"></i> Add Products</button>
                    </div>
                    <div class="card mt-5">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Warehouse Name</th>
                                    <th scope="col">Expiration Date</th>
                                    <th scope="col">Quantity (kg)</th>
                                    <th scope="col">#</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(!empty($products)){
                                    foreach ($products as $product) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $product['id']; ?></th>
                                            <td><?php echo $product['name']; ?></td>
                                            <td>
                                                <?php
                                                if(!empty($categories)) {
                                                    foreach ($categories as $category) {
                                                        if ($category['id'] === $product['category_id']) {
                                                            echo $category['name'];
                                                        }
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if(!empty($warehouses)) {
                                                    foreach ($warehouses as $warehouse) {
                                                        if ($warehouse['id'] === $product['warehouse_id']) {
                                                            echo $warehouse['name'];
                                                        }
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $product['expiration_date']; ?></td>
                                            <td><?php echo $product['quantity']; ?></td>
                                            <td>
                                                <button type="button" data-toggle="modal" data-target="#editProduct<?php echo $product['id']; ?>" class="btn btn-primary">
                                                    <i class="fas fa-pen"></i> Edit
                                                </button>
                                                <!-- Edit warehouse modal -->
                                                <div class="modal fade" id="editProduct<?php echo $product['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editProduct<?php echo $product['id']; ?>" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title" id="editProduct<?php echo $product['id']; ?>">Edit Product</h1>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="../Service/editProduct.php" method="post">
                                                                <div class="modal-body">
                                                                    <div class="my-2">
                                                                        <label>Product name</label>
                                                                        <input type="text" class="form-control" required placeholder="Enter product name" name="name" value="<?php echo $product['name']; ?>">
                                                                    </div>
                                                                    <div class="my-2">
                                                                        <label>Product category name </label>
                                                                        <select class="form-control" name="category_id">
                                                                            <?php
                                                                            if (!empty($categories)){
                                                                                foreach ($categories as $category) {
                                                                                    ?>
                                                                                    <option value="<?php echo $category['id'] ?>" <?php if($category['id'] === $product['category_id']) echo"selected"; ?>>
                                                                                        <?php echo $category['name'] ?>
                                                                                    </option>
                                                                                    <?php
                                                                                }}
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="my-2">
                                                                        <label>Product warehouse name</label>
                                                                        <select class="form-control" name="warehouse_id">
                                                                            <?php
                                                                            if (!empty($warehouses)){
                                                                                foreach ($warehouses as $warehouse) {
                                                                                    ?>
                                                                                    <option value="<?php echo $warehouse['id'] ?>" <?php if($warehouse['id'] === $product['warehouse_id']) echo"selected"; ?>>
                                                                                        <?php echo $warehouse['name'] ?>
                                                                                    </option>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="my-2">
                                                                        <label>Product expiration date</label>
                                                                        <input type="date" class="form-control" required placeholder="Enter product expiration date" name="expiration_date" value="<?php echo $product['expiration_date']; ?>">
                                                                    </div>
                                                                    <div class="my-2">
                                                                        <label>Product quantity (kg)</label>
                                                                        <input type="number" class="form-control" required placeholder="Enter product quantity" name="quantity" value="<?php echo $product['quantity']; ?>">
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary" name="update">Saved</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--  End edit warehouse Modal  -->

                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteProducts<?php echo $product['id']; ?>">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                                <!-- Delete modal -->
                                                <div class="modal fade" id="deleteProducts<?php echo $product['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteProducts<?php echo $product['id']; ?>" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title" id="deleteProducts<?php echo $product['id']; ?>">Delete product</h1>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h3>Do you really want to delete it?</h3>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <a href="../Service/deleteProduct.php?id=<?php echo $product['id']; ?>">
                                                                    <button type="button" class="btn btn-danger">Delete</button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end delete modal  -->
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add product modal -->
        <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addProduct" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="addProduct">Add Products</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../Service/addProduct.php" method="post">
                        <div class="modal-body">
                            <div class="my-2">
                                <label>Product name</label>
                                <input type="text" class="form-control" required placeholder="Enter product name" name="name">
                            </div>
                            <div class="my-2">
                                <label>Product category name </label>
                                <select class="form-control" name="category_id">
                                    <?php
                                    if (!empty($categories)){
                                    foreach ($categories as $category) {
                                        ?>
                                        <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                                    <?php
                                    }}
                                    ?>
                                </select>
                            </div>
                            <div class="my-2">
                                <label>Product warehouse name</label>
                                <select class="form-control" name="warehouse_id">
                                    <?php
                                    if (!empty($warehouses)){
                                        foreach ($warehouses as $warehouse) {
                                            ?>
                                            <option value="<?php echo $warehouse['id'] ?>"><?php echo $warehouse['name'] ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="my-2">
                                <label>Product expiration date</label>
                                <input type="date" class="form-control" required placeholder="Enter product expiration date" name="expiration_date">
                            </div>
                            <div class="my-2">
                                <label>Product quantity (kg)</label>
                                <input type="number" class="form-control" required placeholder="Enter product quantity" name="quantity">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="submit">Saved</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--  End add product Modal  -->
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>

    <?php

}else{

    header("Location: ../index.php");

    exit();

}
?>
