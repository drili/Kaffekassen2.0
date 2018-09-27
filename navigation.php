<!-- navbar -->
<nav class="navbar navbar-expand-lg">
      <div class="site-navbar">
            <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link user-icon" href="#"><img class="logo-header" src="images/user.svg" alt="" /></a>
            </li>
            <li class="nav-item">
            <a class="nav-link logo-desktop" href="products.php"><img class="logo-header" src="images/logo_white.svg" alt="" /></a>
            </li>
            <li class="nav-item">
                  <a href="cart.php" class="nav-link basket-icon">
                        <?php
                        // count products in cart
                        $cart_count=count($_SESSION['cart']);
                        ?>
                        <i class=""></i><span class="badge" id="comparison-count"><?php echo $cart_count; ?></span>
                        <img class="logo-header" src="images/basket.svg" alt="" />
                  </a>
            </li>
            </ul>
      </div>
</nav>
