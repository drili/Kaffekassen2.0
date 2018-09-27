<?php
      // PHP script to update cart
      session_start();

      // Get product ID
      $id = isset($_GET['id']) ? $_GET['id'] : 1;
      $quantity = isset($_GET['quantity']) ? $_GET['quantity'] : "";

      // Quantity min 1
      $quantity=$quantity<=0 ? 1 : $quantity;

      // Remove item from array
      unset($_SESSION['cart'][$id]);

      // Add item with updated quantity
      $_SESSION['cart'][$id]=array(
            'quantity'=>$quantity
      );

      // Redirect
      header('Location: cart.php?action=quantity_updated&id=' . $id);
?>
