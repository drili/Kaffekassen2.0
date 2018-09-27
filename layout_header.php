<?php
      session_start();
      $_SESSION['cart']=isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
?>
<!DOCTYPE html>
<html>
      <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title><?php echo isset($page_title) ? $page_title : "Kaffekassen"; ?></title>

            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

            <!-- Custom css -->
            <link rel="stylesheet" href="libs/css/custom.css">
            <link rel="stylesheet" href="libs/css/style.css">

      </head>

      <body>

            <?php include 'navigation.php'; ?>

            <?php
            if (strpos($_SERVER['SCRIPT_NAME'], 'products.php') !== false) {
                  include 'header-box.php';
            }
            ?>

            <div class="full-container">
                  <div class="container"> <!-- Container -->
                        <div class="row">
                              <div class="col-md-12">
                                    <div class="page-header">
                                          <h1><?php echo isset($page_title) ? $page_title : "Header title"; ?></h1>
                                    </div>
                              </div>
