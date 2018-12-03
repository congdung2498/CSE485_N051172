<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title><?php echo isset($page_title) ? strip_tags($page_title) : "Store Admin"; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css" />
  
     <!-- admin custom CSS -->
    <link href="<?php echo $home_url . "libs/css/admin.css" ?>" rel="stylesheet" />
 
</head>
<body ng-controller="TestAppCtrl">

    <?php
    // include top navigation bar
    include_once "navigation.php";
    ?>
 
    <!-- container -->
    <div class="container">
 
        <!-- display page title -->
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo isset($page_title) ? $page_title : "The Code of a Ninja"; ?></h1>
            </div>
        </div>