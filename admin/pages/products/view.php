<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Products</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Starter Page</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Products</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <?php
                if (isset($_SESSION['message'])) {
                ?>

                    <div class="alert <?php echo $_SESSION['alert_type']; ?> alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5>
                            <?php
                            if ($_SESSION['type'] == "Success") {
                            ?>
                                <i class="icon fas fa-check"></i>
                            <?php
                            } else {
                            ?>
                                <i class="icon fas fa-ban"></i>
                            <?php } ?>

                            <?php echo $_SESSION['message'];  ?>

                        </h5>
                    </div>

                <?php

                    unset($_SESSION['message']);
                    unset($_SESSION['alert_type']);
                    unset($_SESSION['type']);
                }
                ?>
                <div class="d-flex justify-content-between">
                    <a href="dashboard.php?page=addproduct" class="btn mb-3 btn-primary">+ Tambah Data</a>
                    <a href="pages/products/print.php" class="btn btn-success mb-3" target="_blank"><i class="fas fa-print mr-2"></i>Cetak</a>
                </div>
                <!-- search -->
                <form action="" method="get" class="">
                    <input type="hidden" name="page" value="products">
                    <div class="row">
                        <div class="col-10">
                            <input class="form-control mb-2" type="text" name="product_name" value="<?php if (isset($_GET['product_name'])) { echo $_GET['product_name'];} ?>" placeholder="Search by product code">
                        </div>
                        <div class="col-2">
                            <button class="btn btn-primary" type="submit" name="search"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">No.</th>
                            <th>Code</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = "SELECT * FROM products 
                        INNER JOIN categories ON products.category_id = categories.category_id ";

                        if (isset($_GET['product_name'])) {
                            $product_name = $_GET['product_name'];
                            $sql .= " WHERE product_name LIKE '%$product_name%'";
                        }

                        $query = mysqli_query($conn, $sql);
                        while ($products = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $products['product_code']; ?></td>
                                <td><?php echo $products['product_name']; ?></td>
                                <td><?php echo $products['category_name']; ?></td>
                                <td><?php echo $products['price']; ?></td>
                                <td><?php echo $products['stock']; ?></td>
                                <td>
                                    <a href="dashboard.php?page=editproduct&product_id=<?php echo $products['product_id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="pages/products/action.php?act=delete&product_id=<?php echo $products['product_id']; ?>" onclick="return confirm('are you sure? want to delete this data?')" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

            <!-- /.card-footer-->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>