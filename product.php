<?php
      // start session
      session_start();

      include_once "config/database.php";
      include_once "objects/product.php";
      include_once "objects/product_image.php";

      // Database connection
      $database = new Database();
      $db = $database->getConnection();

      // Initialize objects
      $product = new Product($db);
      $product_image = new ProductImage($db);

      // Get ID of the product to be edited
      $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

      // Set the id as product id property
      $product->id = $id;

      // To read single record product
      $product->readOne();

      $page_title = $product->name;

      // include page header HTML
      include_once 'layout_header.php';


      echo "<div class='col-md-12 backtoproducts'>";
            echo "<a href='products.php'><i class='fas fa-arrow-left'></i>Tilbage til produkter</a>";
      echo "</div>";
      // Back to products

      // Display product thumbnails
      // set product id
      $product_image->product_id=$id;

      // read all related product image
      $stmt_product_image = $product_image->readByProductId();

      // count all relatd product image
      $num_product_image = $stmt_product_image->rowCount();

      echo "<div class='col-md-1'>";
      // if count is more than zero
      if($num_product_image>0){
            // loop through all product images
            while ($row = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
                  // Image name and url
                  $product_image_name = $row['name'];
                  $source="uploads/images/{$product_image_name}";
                  echo "<img src='{$source}' class='product-img-thumb' data-img-id='{$row['id']}' />";
            }
      }else{ echo "No images."; }
      echo "</div>";


      // Display product image
      echo "<div class='col-md-4' id='product-img'>";

      // Read all related product image
      $stmt_product_image = $product_image->readByProductId();
      $num_product_image = $stmt_product_image->rowCount();

      // If count is > 0
      if($num_product_image>0){
            // Loop through all product images
            $x=0;
            while ($row = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
                  // Image name and source url
                  $product_image_name = $row['name'];
                  $source="uploads/images/{$product_image_name}";
                  $show_product_img=$x==0 ? "display-block" : "display-none";
                  echo "<a href='{$source}' target='_blank' id='product-img-{$row['id']}' class='product-img {$show_product_img}'>";
                  echo "<img src='{$source}' style='width:100%;' />";
                  echo "</a>";
                  $x++;
            }
      }else{ echo "No images."; }
      echo "</div>";


      // content will be here
      // product details will be here
      // Display product details
      echo "<div class='col-md-5'>";

            echo "<div class='product-detail'>Price:</div>";
            echo "<h4 class='m-b-10px price-description'>&#36;" . number_format($product->price, 2, '.', ',') . "</h4>";

            echo "<div class='product-detail'>Produkt beskrivelse:</div>";
            echo "<div class='m-b-10px'>";
            // make html
            $page_description = htmlspecialchars_decode(htmlspecialchars_decode($product->description));

            // show to user
            echo $page_description;
            echo "</div>";

            echo "<div class='product-detail'>Produkt kategori:</div>";
            echo "<div class='m-b-10px'>{$product->category}</div>";

      echo "</div>";


      // Render 'Cart' button
      echo "<div class='col-md-2'>";
            // If product is in cart
            if(array_key_exists($id, $_SESSION['cart'])){
                  echo "<div class='m-b-10px'>Dette produkt er allerede i din kurv.</div>";
                  echo "<a href='cart.php' class='btn btn-success w-100-pct'>";
                        echo "Update Cart";
                  echo "</a>";
            }

            // If product not in cart
            else{
                  echo "<form class='add-to-cart-form'>";
                        // Product ID
                        echo "<div class='product-id display-none'>{$id}</div>";

                        echo "<div class='m-b-10px f-w-b'>Antal:</div>";
                        echo "<input type='number' value='1' class='form-control m-b-10px cart-quantity' min='1' />";

                        // Enable add to cart
                        echo "<button style='width:100%;' type='submit' class='btn btn-primary add-to-cart m-b-10px'>";
                              echo "<span class='glyphicon glyphicon-shopping-cart'></span> Tilføj til kurv";
                        echo "</button>";

                  echo "</form>";
            }
      echo "</div>";


      // include page footer HTML
      include_once 'layout_footer.php';
?>
