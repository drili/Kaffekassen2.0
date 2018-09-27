<?php
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

$page_title = "Dine informationer";
include "layout_header.php";

?>

<form class="costumerInfo col-sm-12 col-md-6" action="sendEmail.php" method="post">
  <h3>Gæste checkout</h3>
  <br>
  <input type="text" name="fornavn" placeholder="Fornavn" value="">
  <input type="text" name="efternavn" placeholder="Efternavn" value="">
  <br>
  <br>
  <input type="text" name="email" placeholder="Email" value="">
  <br>
  <br>
  <input type="text" name="adresse" placeholder="Adresse" value="">
  <br>
  <br>
  <input type="text" name="postnr" placeholder="Post nr." value="">
  <input type="text" name="by" placeholder="By" value="">
  <br>
  <br>
  <input type="text" name="region" placeholder="Region"  value="">
  <br>
  <br>
  <input type="radio" name="" value=""> <em>Benyt en anden faktureringsadresse</em>
  <br>
  <br>
  <input style="width: 70px;" type="submit" name="submit" value="Bestil">
  <br>
  <br>
  <br>
  <br>

</form>

<form class="col-sm-12 col-md-6" action="#" method="post">
  <h3>Allerede kunde?</h3>
  <p>Hvis ikke opret <a href="#">her</a></p>
  <br>
  <input type="text" name="bruger" placeholder="Brugernavn" value="">
  <input type="password" name="psw" placeholder="Adgangskode" value="">
  <br>
  <br>
  <input style="width: 70;" type="submit" name="" value="Login">

</form>

<?php
include "layout_footer.php"
 ?>
