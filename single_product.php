<?php

  include('server/connection.php');
if(isset($_GET['product_id'])){

  $product_id = $_GET['product_id'];

  $stmt = $conn->prepare("SELECT * FROM `products` WHERE product_id = ?");

  $stmt->bind_param("i",$product_id);

  $stmt->execute();

  $products = $stmt->get_result(); //array[]


//no product id was given
}else{
  header('location: index.php');
}

?>



<?php include('layout/header.php'); ?>

      <!--Single product-->

      <section class="container single-product my-5 pt-5">
        <div class="row my-5">

            <?php while($row = $products->fetch_assoc()){ ?>

            <div class="col-lg-5 col-md-6 col-sm-12 big-img">
                <img class="img-fluid big-img pb-1" src="img/<?php echo $row['product_image']; ?>" id="mainImg"/>
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="img/<?php echo $row['product_image']; ?>" width="100%" class="small-img"/>
                    </div>
                    <div class="small-img-col">
                        <img src="img/<?php echo $row['product_image2']; ?>" width="100%" class="small-img"/>
                    </div>
                    <div class="small-img-col">
                        <img src="img/<?php echo $row['product_image3']; ?>" width="100%" class="small-img"/>
                    </div>
                    <div class="small-img-col">
                        <img src="img/<?php echo $row['product_image4']; ?>" width="100%" class="small-img"/>
                    </div>
                </div>
            </div>

            

            <div class="col-lg-6 col-md-12 col-12">
                <h6><?php echo $row['product_category']; ?></h6>
                <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
                <h2>$ <?php echo $row['product_price']; ?></h2>

                <form method="POST" action="cart.php">
                  <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                  <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>">
                  <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
                  <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">

                  <input type="number" min="1" value="1" name="product_quantity">
                  <button class="btn buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
               </form>
            <h4 class="mt-5 mb-5">Product Details</h4>
                <span><?php echo $row['product_description']; ?></span>
            </div>

            <?php } ?>

        </div>
      </section>

      <!--Related product-->

      <section id="featured" class="my-5 pb-5 py-5">
        <div class="container text-center mt-5 py-5">
          <h3>Related products</h3>
          <hr class="mx-auto">
        </div>
        <div class="row mx-auto container-fluid">
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="img/dell1.webp"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half"></i>
            </div>
            <h5 class="p-name">Dell Laptop</h5>
            <h4 class="p-price">$500.4</h4>
            <button class="btn buy-btn">Buy Now</button>
          </div>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="img/macbook.webp"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half"></i>
            </div>
            <h5 class="p-name">Mac book Laptop</h5>
            <h4 class="p-price">$1,500.4</h4>
            <button class="btn buy-btn">Buy Now</button>
          </div>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="img/hp1.webp"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half"></i>
            </div>
            <h5 class="p-name">HP Elite Book Laptop</h5>
            <h4 class="p-price">$150</h4>
            <button class="btn buy-btn">Buy Now</button>
          </div>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="img/dell2.webp"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half"></i>
            </div>
            <h5 class="p-name">Dell Laptop</h5>
            <h4 class="p-price">$450.7</h4>
            <button class="btn buy-btn">Buy Now</button>
          </div>
        </div>
      </section>












    <script>

  var mainImg = document.getElementById("mainImg");
  var smallImg = document.getElementsByClassName("small-img");


  for(let i=0; i<4; i++){
  smallImg[i].onclick= function(){
    mainImg.src= smallImg[i].src;
  }
  }


    </script>
<?php include('layout/footer.php'); ?>