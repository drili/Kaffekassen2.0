

<?php
      // start session
      session_start();
      // connect to database
      include 'config/database.php';

      // include objects
      include_once "objects/product.php";
      include_once "objects/product_image.php";

      // class instances
      // get database connection
      $database = new Database();
      $db = $database->getConnection();

      // initialize objects
      $product = new Product($db);
      $product_image = new ProductImage($db);

      // Initiliaze action and pagination
      $action = isset($_GET['action']) ? $_GET['action'] : "";

      // for pagination purposes
      $page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
      $records_per_page = 200; // set records or rows of data per page
      $from_record_num = ($records_per_page * $page) - $records_per_page; // calculate for the query LIMIT clause

      // set page title
      $page_title="";

      // page header html
      include 'layout_header.php';
?>

<?php
      // contents will be here
      echo "<div class='col-md-12'>";
            if($action=='added'){
                  echo "<div class='alert alert-info'>";
                        echo "Produktet er tilføjet til din kurv!";
                  echo "</div>";
            }

            if($action=='exists'){
                  echo "<div class='alert alert-info'>";
                        echo "Produktet er allerede tilføjet til kurv!";
                  echo "</div>";
            }
      echo "</div>";

      // Request data from the database
      // read all products in the database
      $stmt=$product->read($from_record_num, $records_per_page);

      // count number of retrieved products
      $num = $stmt->rowCount();

      // if products retrieved were more than zero
      if($num>0){
            // needed for paging
            // $page_url="products.php?";
            // $total_rows=$product->count();

            // show products
            include_once "read_products_template.php";
      }

      // tell the user if there's no products in the database
      else{
            echo "<div class='col-md-12'>";
                  echo "<div class='alert alert-danger'>Ingen produkter fundet.</div>";
            echo "</div>";
      }

      // layout footer code
      include 'layout_footer.php';
?>
