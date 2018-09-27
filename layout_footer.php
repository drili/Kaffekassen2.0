

                        </div> <!-- Row end -->
                  </div> <!-- Container end -->


                  <footer id="footer">
                      <div class="container">
                          <div class="row">
                              <div class="col-md-4">
                                  <div class="footer-align-left">
                                      <div>
                                          <a href="#">Handelsbetingelser</a>
                                          <a href="#">Privatlivspolitik</a>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="footer-align-center">
                                      <a href="#"><img src="./images/social/facebook.svg" alt=""></a>
                                      <a href="#"><img src="./images/social/instagram.svg" alt=""></a>
                                      <a href="#"><img src="./images/social/linkedin.svg" alt=""></a>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="footer-align-right">
                                      <img class="footer-logo" src="./images/logo_white.svg" alt="">
                                      <p>CVR.: 12 34 56 78</p>
                                      <p>Telefon: +45 12 34 56 78</p>
                                      <p>E-mail: mail@kaffekassen.dk</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </footer>
            </div>

            <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

            <!-- Custom scripts -->
            <script>
                  $(document).ready(function(){
                        // add to cart button listener
                        $('.add-to-cart-form').on('submit', function(){
                              // info is in the table / single product layout
                              var id = $(this).find('.product-id').text();
                              var quantity = $(this).find('.cart-quantity').val();

                              // redirect to add_to_cart.php, with parameter values to process the request
                              window.location.href = "add_to_cart.php?id=" + id + "&quantity=" + quantity;
                              return false;
                        });
                  });

                  // update quantity button listener
                  $('.update-quantity-form').on('submit', function(){
                        // get basic information for updating the cart
                        var id = $(this).find('.product-id').text();
                        var quantity = $(this).find('.cart-quantity').val();

                        // redirect to update_quantity.php, with parameter values to process the request
                        window.location.href = "update_quantity.php?id=" + id + "&quantity=" + quantity;
                        return false;
                  });

                  // Make image hover work
                  // change product image on hover
                  $(document).on('mouseenter', '.product-img-thumb', function(){
                        var data_img_id = $(this).attr('data-img-id');
                        $('.product-img').hide();
                        $('#product-img-'+data_img_id).show();
                  })
            </script>

            <script type="text/javascript">
                  $(document).ready(function() {
                        var docHeight = $(window).height();
                        var footerHeight = $('#footer').height();
                        var footerTop = $('#footer').position().top + footerHeight;
                        if (footerTop < docHeight) {
                        $('#footer').css('margin-top', 10 + (docHeight - footerTop) + 'px');
                        }
                  });
            </script>

            <!-- Filter  -->
            <script>
                  filterSelection("all")
                  function filterSelection(c) {
                        var x, i;
                        x = document.getElementsByClassName("filterDiv");
                        if (c == "all") c = "";
                        for (i = 0; i < x.length; i++) {
                              w3RemoveClass(x[i], "show");
                              if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
                        }
                  }

                  function w3AddClass(element, name) {
                        var i, arr1, arr2;
                        arr1 = element.className.split(" ");
                        arr2 = name.split(" ");
                        for (i = 0; i < arr2.length; i++) {
                              if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
                        }
                  }

                  function w3RemoveClass(element, name) {
                        var i, arr1, arr2;
                        arr1 = element.className.split(" ");
                        arr2 = name.split(" ");
                        for (i = 0; i < arr2.length; i++) {
                        while (arr1.indexOf(arr2[i]) > -1) {
                        arr1.splice(arr1.indexOf(arr2[i]), 1);
                        }
                        }
                        element.className = arr1.join(" ");
                  }

                  // Add active class to the current button (highlight it)
                  var btnContainer = document.getElementById("myBtnContainer");
                  var btns = btnContainer.getElementsByClassName("btna");
                  for (var i = 0; i < btns.length; i++) {
                        btns[i].addEventListener("click", function(){
                              var current = document.getElementsByClassName("active");
                              current[0].className = current[0].className.replace(" active", "");
                              this.className += " active";
                        });
                  }
            </script>
      </body>
</html>
