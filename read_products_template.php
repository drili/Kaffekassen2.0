<?php
      include_once "config/database.php";
      include_once "objects/product.php";
      include_once "objects/product_image.php";

      // Database connection
      $database = new Database();
      $db = $database->getConnection();

      // Initialize objects
      $product = new Product($db);
      $product_image = new ProductImage($db);

      // Template to display products
      if(!isset($_SESSION['cart'])){
            $_SESSION['cart']=array();
      }

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            // creating box
            echo "<div class='col-md-4 m-b-20px'>";

            // product id for javascript access
            echo "<div class='product-id display-none'>{$id}</div>";

            echo "<a href='product.php?id={$id}' class='product-link {$category}' id='{$category}'>";
            // select and show first product image
            $product_image->product_id=$id;
            $stmt_product_image=$product_image->readFirst();

            while ($row_product_image = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
                  echo "<div class='m-b-10px products-image'>";
                        echo "<p>View Product</p>";
                        echo "<img src='uploads/images/{$row_product_image['name']}' class='w-100-pct' />";
                  echo "</div>";
            }

            // product name
            echo "<div class='product-name m-b-10px products-name'>{$name}</div>";
                  echo "<h4>&#36;" . number_format($price, 2, '.', ',') . "</h4>";
                  echo "</a>";

                  // add to cart button
                  echo "<div class='m-b-10px'>";
                  if(array_key_exists($id, $_SESSION['cart'])){
                        echo "<br>";
                        echo "<a href='cart.php' class='btn btn-success w-100-pct'>";
                              echo "Gå til kurv";
                        echo "</a>";
                  }else{
                        echo "<br>";
                        echo "<a href='add_to_cart.php?id={$id}&page={$page}' class='btn btn-primary w-100-pct addtocart'>Tilføj til kurv<i class='fas fa-plus'></i></a>";
                  }
                  echo "</div>";
            echo "</div>";
      }

      include_once "paging.php";
?>
