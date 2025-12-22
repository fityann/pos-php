<?php
include '../../../config/koneksi.php';

session_start();
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    if ($act == "insert") {
        $product_code = $_POST['product_code'];
        $product_name = $_POST['product_name'];
        $category_id = $_POST['category_id'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];


        $qcheck_product = "SELECT * FROM products WHERE product_code = '$product_code'";

        $exe_checkproduct = mysqli_query($conn, $qcheck_product);
        $checkproduct = mysqli_num_rows($exe_checkproduct);
        if ($checkproduct > 0) {
            $_SESSION['message'] = "Data product code sudah ada ";
            $_SESSION['alert_type'] = "alert-danger";
            $_SESSION['type'] = "failed";
            header('location:../../dashboard.php?page=products');
            mysqli_close($conn);
            exit();
        }





        $query = "INSERT INTO products (product_code, product_name, category_id, price, stock) VALUES ('$product_code', '$product_name', '$category_id', '$price', '$stock')";
        $execute = mysqli_query($conn, $query);

        if ($execute) {
            $_SESSION['message'] = "Data berhasil ditambahkan";
            $_SESSION['alert_type'] = "alert-success";
            $_SESSION['type'] = "success";
            header('location:../../dashboard.php?page=products');
            mysqli_close($conn);
            exit();
        } else {
            $_SESSION['message'] = "Data gagal ditambahkan";
            $_SESSION['alert_type'] = "alert-danger";
            $_SESSION['type'] = "failed";
            header('location:../../dashboard.php?page=products');
            mysqli_close($conn);
            exit();
        }
    } elseif ($act == "update") {
        $product_code = $_POST['product_code'];
        $product_name = $_POST['product_name'];
        $category_id = $_POST['category_id'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];

        $sql = "UPDATE products SET product_code='$product_code', product_name='$product_name', 
        category_id='$category_id', price='$price', stock='$stock' WHERE product_id='$_GET[product_id]'";
        $execute = mysqli_query($conn, $sql);

        if ($execute) {
            $_SESSION['message'] = "Data berhasil diupdate";
            $_SESSION['alert_type'] = "alert-success";
            $_SESSION['type'] = "success";
            header('location:../../dashboard.php?page=products');
            mysqli_close($conn);
            exit();
        } else {
            $_SESSION['message'] = "Data gagal diupdate";
            $_SESSION['alert_type'] = "alert-danger";
            $_SESSION['type'] = "failed";
            header('location:../../dashboard.php?page=products');
            mysqli_close($conn);
            exit();
        }
    } elseif ($act == "delete") {
        $sql = "DELETE FROM products WHERE product_id='$_GET[product_id]'";
        $execute = mysqli_query($conn, $sql);

        if ($execute) {
            $_SESSION['message'] = "Data berhasil dihapus";
            $_SESSION['alert_type'] = "alert-success";
            $_SESSION['type'] = "success";
            header('location:../../dashboard.php?page=products');
            mysqli_close($conn);
            exit();
        } else {
            $_SESSION['message'] = "Data gagal dihapus";
            $_SESSION['alert_type'] = "alert-danger";
            $_SESSION['type'] = "failed";
            header('location:../../dashboard.php?page=products');
            mysqli_close($conn);
            exit();
        }
    }
}
