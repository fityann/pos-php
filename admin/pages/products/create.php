<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Products</h1>
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
<div class="content d-flex justify-content-center">
    <div class="col-6">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Products</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body ">
                <form action="pages/products/action.php?act=insert" method="post">
                    <input class="form-control mb-2" type="text" name="product_code" placeholder="Product Code" required>
                    <select class="form-control mb-2" name="category_id" required>
                          <option>--Choose Category--</option>
                          <?php
                            $sql = "SELECT * FROM categories";
                            $query = mysqli_query($conn, $sql);
                            while($category = mysqli_fetch_array($query)){
                                ?>
                                <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
                                <?php
                            }   
                          ?>
                    </select>
                    <input class="form-control mb-2" type="text" name="product_name" placeholder="Product Name" required>
                    <input class="form-control mb-2" type="text" name="price" placeholder="Price" required>
                    <input class="form-control mb-2" type="text" name="stock" placeholder="Stock" required>
                    <div class="d-flex justify-content-end mt-3">
                        <button class="btn btn-primary mr-2" type="submit">Save</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->

            <!-- /.card-footer-->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>