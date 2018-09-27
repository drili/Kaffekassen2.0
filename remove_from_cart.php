<?php
      // Remove product on cart
      // start session
      session_start();

      // Get product ID
      $id = isset($_GET['id']) ? $_GET['id'] : "";
      $name = isset($_GET['name']) ? $_GET['name'] : "";

      // Remove the item from array
      unset($_SESSION['cart'][$id]);

      // Redirect removed
      header('Location: cart.php?action=removed&id=' . $id);
?>
