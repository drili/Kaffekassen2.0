<?php
      // start session
      session_start();

      // Product id
      $id = isset($_GET['id']) ? $_GET['id'] : "";
      $quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;
      $page = isset($_GET['page']) ? $_GET['page'] : 1;

      // Quantity min 1
      $quantity=$quantity<=0 ? 1 : $quantity;

      // New item to array
      $cart_item=array(
            'quantity'=>$quantity
      );

      if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
      }

      // Check if the item is in the array, if it is, do not add
      if(array_key_exists($id, $_SESSION['cart'])){
            // redirect to product list and tell the user it was added to cart
            header('Location: products.php?action=exists&id=' . $id . '&page=' . $page);
      }

      else {
            $_SESSION['cart'][$id]=$cart_item;
            // redirect to product list and tell the user it was added to cart
            header('Location: products.php?action=added&page=' . $page);
      }
?>
