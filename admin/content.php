<?php

include '../config/koneksi.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'products':
            include 'pages/products/view.php';
            break;
        case 'customers':
            include 'pages/customers/view.php';
            break;
        case 'addproduct':
            include 'pages/products/create.php';
            break;
        case 'editproduct':
            include 'pages/products/edit.php';
            break;
    }
} else {
    include 'pages/home.php';
}