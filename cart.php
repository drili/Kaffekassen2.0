<?php
      // start session
      session_start();

      // connect to database
      include 'config/database.php';

      // include objects
      include_once "objects/product.php";
      include_once "objects/product_image.php";

      // get database connection
      $database = new Database();
      $db = $database->getConnection();

      // initialize objects
      $product = new Product($db);
      $product_image = new ProductImage($db);

      // set page title
      $page_title="Din Kurv";

      // include page header html
      include 'layout_header.php';

      // contents will be here
      $action = isset($_GET['action']) ? $_GET['action'] : "";

      echo "<div class='col-md-12'>";
            if($action=='removed'){
                  echo "<div class='alert alert-info'>";
                        echo "Produktet er fjernet fra kurven!";
                  echo "</div>";
            }

            else if($action=='quantity_updated'){
                  echo "<div class='alert alert-info'>";
                        echo "Antallet af produkter er blevet opdateret!";
                  echo "</div>";
            }
      echo "</div>";


      // DISPLAY CART ITEMS
      if(count($_SESSION['cart'])>0){
            // get the product ids
            $ids = array();
            foreach($_SESSION['cart'] as $id=>$value){
                  array_push($ids, $id);
            }

            $stmt=$product->readByIds($ids);

            $total=0;
            $item_count=0;

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                  extract($row);

                  $quantity=$_SESSION['cart'][$id]['quantity'];
                  $sub_total=$price*$quantity;

                  // =================
                  echo "<div class='cart-row'>";
                        echo "<div class='col-md-2'>";
                              // select and show first product image
                              $product_image->product_id=$id;
                              $stmt_product_image=$product_image->readFirst();

                              while ($row_product_image = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
                                    echo "<div class='m-b-10px'>";
                                          echo "<img src='uploads/images/{$row_product_image['name']}' class='w-100-pct' />";
                                    echo "</div>";
                              }
                        echo "</div>";
                        echo "<div class='col-md-6'>";

                        echo "<div class='product-name m-b-10px'><h4>{$name}</h4></div>";

                        // update quantity
                        echo "<form class='update-quantity-form'>";
                        echo "<div class='product-id' style='display:none;'>{$id}</div>";
                        echo "<div class='input-group'>";
                        echo "<input type='number' name='quantity' value='{$quantity}' class='form-control cart-quantity' min='1' />";
                        echo "<span class='input-group-btn'>";
                        echo "<button class='btn btn-default update-quantity' type='submit'>Opdater</button>";
                        echo "</span>";
                        echo "</div>";
                        echo "</form>";

                        // delete from cart
                        echo "<a href='remove_from_cart.php?id={$id}' class='btn btn-default'>";
                        echo "Slet";
                        echo "</a>";
                        echo "</div>";

                        echo "<div class='col-md-4'>";
                        echo "<h4>&#36;" . number_format($price, 2, '.', ',') . "</h4>";
                        echo "</div>";
                        echo "</div>";
                  // =================

                  $item_count += $quantity;
                  $total+=$sub_total;
            }

                        echo "<div class='col-md-8'></div>";
                        echo "<div class='col-md-4'>";
                        echo "<div class='cart-row'>";
                        echo "<h4 class='m-b-10px'>Total ({$item_count} vare)</h4>";
                        echo "<h4>&#36;" . number_format($total, 2, '.', ',') . "</h4>";
                        echo "<a href='checkout.php' class='btn btn-success m-b-10px'>";
                        echo "<span class='glyphicon glyphicon-shopping-cart'></span> Fortsæt bestilling";
                        echo "</a>";
                        echo "</div>";
                  echo "</div>";
      }

      // no products were added to cart
      else{
            echo "<div class='col-md-12'>";
                  echo "<div class='alert alert-danger'>";
                        echo "Ingen produkter i din kurv!";
                  echo "</div>";
            echo "</div>";
      }

      // layout footer
      include 'layout_footer.php';
?>
