<?php include('layout/header.php'); ?>


      <!----Home----->

      <section id="home">
        <div class="container">
          <h5>NEW ARRIVALS</h5>
          <h1><span>Best Prices</span> This Season</h1>
          <p>E-shop offers the best products for the most affordable prices</p>
          <a href="shop.php" class="btn checkout-btn">Shop Now</a>
        </div>
      </section>



      <!--New-->

      <section id="new" class="w-100">
        <div class="row p-0 m-0">
          <!--one-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="img/macbook.webp">
            <div class="details">
              <h3>Extremly Awesome Mac Laptop</h3>
              <button class="btn text-uppercase">Shop Now</button>
            </div>
          </div>
          <!--two-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="img/dell2.webp">
            <div class="details">
              <h3>Extremly Awesome HP Laptop</h3>
              <button class="btn text-uppercase">Shop Now</button>
            </div>
          </div>
          <!--three-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="img/dell1.webp">
            <div class="details">
              <h3>Extremly Awesome DELL Laptop</h3>
              <button class="btn text-uppercase">Shop Now</button>
            </div>
          </div>


        </div>
      </section>

      <!--Featured-->

      <section id="featured" class="my-0 pb-3">
        <div class="container text-center mt-3 py-3">
          <h3>Our featured products</h3>
          <hr class="mx-auto">
          <p>Here you can check out our featured products</p>
        </div>
        <div class="row mx-auto container-fluid">
        
          <?php  include('server/get_featured_products.php'); ?>

          <?php while($row= $featured_products->fetch_assoc()){  ?>

          <div onclick="window.location.href='<?php echo "single_product.php?product_id=".$row['product_id'];  ?>';" class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="img/<?php echo $row['product_image']; ?>"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price">$ <?php echo $row['product_price']; ?></h4>
            <a href="<?php echo "single_product.php?product_id=". $row['product_id']; ?>" class="btn checkout-btn">Buy Now</a>
          </div>

          <?php } ?>
          
        </div>
      </section>

      <!--Banner-->

      <section id="Banner" class="my-3 py-3">
        <div class="container">
          <h4>MID SEASON'S SALE</h4>
          <h1>Autumn Collection <br>Up to 30% OFF</h1>
          <button class="btn text-uppercase">shop now</button>
        </div>
      </section>

      <!--Laptops-->
      <section id="featured" class="my-5 pb-3">
        <div class="container text-center mt-3 py-3">
          <h3>Laptop products</h3>
          <hr class="mx-auto">
          <p>Here you can check out our Stored Laptops</p>
        </div>
        <div class="row mx-auto container-fluid">
        
          <?php  include('server/get_computers.php'); ?>

          <?php while($row= $computers->fetch_assoc()){  ?>

          <div onclick="window.location.href='<?php echo "single_product.php?product_id=".$row['product_id'];  ?>';" class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="img/<?php echo $row['product_image']; ?>"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price">$ <?php echo $row['product_price']; ?></h4>
            <a href="<?php echo "single_product.php?product_id=". $row['product_id']; ?>" class="btn checkout-btn">Buy Now</a>
          </div>

          <?php } ?>
          
        </div>
          
          
        </div>
      </section>

      <!--Watches-->
      <section id="featured" class="my-5 pb-3">
        <div class="container text-center mt-3 py-3">
          <h3>Watches products</h3>
          <hr class="mx-auto">
          <p>Here you can check out our Stored Watches</p>
        </div>
        <div class="row mx-auto container-fluid">
        
          <?php  include('server/get_watches.php'); ?>

          <?php while($row= $watches->fetch_assoc()){  ?>

          <div onclick="window.location.href='<?php echo "single_product.php?product_id=".$row['product_id'];  ?>';" class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="img/<?php echo $row['product_image']; ?>"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price">$ <?php echo $row['product_price']; ?></h4>
            <a href="<?php echo "single_product.php?product_id=". $row['product_id']; ?>" class="btn checkout-btn">Buy Now</a>
          </div>

          <?php } ?>
          
        </div>
          
          
        </div>
      </section>

      <!--Phones-->
      <section id="featured" class="my-5 pb-3">
        <div class="container text-center mt-3 py-3">
          <h3>Phone products</h3>
          <hr class="mx-auto">
          <p>Here you can check out our Stored Phones</p>
        </div>
        <div class="row mx-auto container-fluid">
        
          <?php  include('server/get_phones.php'); ?>

          <?php while($row= $phones->fetch_assoc()){  ?>

          <div onclick="window.location.href='<?php echo "single_product.php?product_id=".$row['product_id'];  ?>';" class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="img/<?php echo $row['product_image']; ?>"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price">$ <?php echo $row['product_price']; ?></h4>
            <a href="<?php echo "single_product.php?product_id=". $row['product_id']; ?>" class="btn checkout-btn">Buy Now</a>
          </div>

          <?php } ?>
          
        </div>
          
          
        </div>
      </section>

      <!--Watches-->
      <section id="featured" class="my-5 pb-3">
        <div class="container text-center mt-3 py-3">
          <h3>Speakers & Earphones products</h3>
          <hr class="mx-auto">
          <p>Here you can check out our Stored Speakers & Earphones</p>
        </div>
        <div  class="row mx-auto container-fluid">
        
          <?php  include('server/get_speakers.php'); ?>

          <?php while($row= $speakers->fetch_assoc()){  ?>

          <div onclick="window.location.href='<?php echo "single_product.php?product_id=".$row['product_id'];  ?>';" class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="img/<?php echo $row['product_image']; ?>"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price">$ <?php echo $row['product_price']; ?></h4>
            <a href="<?php echo "single_product.php?product_id=". $row['product_id']; ?>" class="btn checkout-btn">Buy Now</a>
          </div>

          <?php } ?>
          
        </div>
          
          
        </div>
      </section>

      <!--Peripherals-->
      <section id="featured" class="my-5 pb-3">
        <div class="container text-center mt-3 py-3">
          <h3>Other Peripherals</h3>
          <hr class="mx-auto">
          <p>Here you can check out our Stored Peripherals</p>
        </div>
        <div class="row mx-auto container-fluid">
        
          <?php  include('server/get_peripherals.php'); ?>

          <?php while($row= $peripherals->fetch_assoc()){  ?>

          <div onclick="window.location.href='<?php echo "single_product.php?product_id=".$row['product_id'];  ?>';" class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="img/<?php echo $row['product_image']; ?>"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price">$ <?php echo $row['product_price']; ?></h4>
            <a href="<?php echo "single_product.php?product_id=". $row['product_id']; ?>" class="btn checkout-btn">Buy Now</a>
          </div>

          <?php } ?>
          
        </div>
          
          
        </div>
      </section>

<?php include('layout/footer.php'); ?>