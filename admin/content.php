<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'products':
            include 'pages/products/view.php';
            break;
    }
} else {
    include 'pages/home.php';
}