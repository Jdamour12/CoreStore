<?php



include('server/connection.php');

//use th search section
if(isset($_POST['search'])){

  //1. determine page no
  if(isset($_GET['page_no']) && $_GET['page_no'] !=""){
    //if user has already entered page then page number is the one they selected

    $page_no = $_GET['page_no'];
  }else{
    //if user just entered the page the default page is 1
    $page_no = 1;
  }

  $category = $_POST['category'];
  $price = $_POST['price'];

  //2. return number of products in database
  $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products WHERE product_category=? AND product_price<=?");
  $stmt1->bind_param('si',$category,$price);
  $stmt1->execute();
  $stmt1->bind_result($total_records);
  $stmt1->store_result();
  $stmt1->fetch();

  //3. products per page
  $total_records_per_page = 8;

  $offset = ($page_no-1) * $total_records_per_page;

  $previous_page = $page_no - 1;
  $next_page = $page_no + 1;

  $adjacents = "1";

  $total_no_of_pages = ceil($total_records/$total_records_per_page);

  //4. Get products
  
  $stmt2 = $conn->prepare("SELECT * FROM products WHERE product_category=? AND product_price<=? LIMIT $offset,$total_records_per_page");
  $stmt2->bind_param('si',$category,$price);
  $stmt2->execute();
  $products = $stmt2->get_result();


 // return all products
}else{

  //1. determine page no
  if(isset($_GET['page_no']) && $_GET['page_no'] !=""){
    //if user has already entered page then page number is the one they selected

    $page_no = $_GET['page_no'];
  }else{
    //if user just entered the page the default page is 1
    $page_no = 1;
  }

  //2. return number of products in database
  $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products");
  $stmt1->execute();
  $stmt1->bind_result($total_records);
  $stmt1->store_result();
  $stmt1->fetch();

 //3. products per page
  $total_records_per_page = 8;

  $offset = ($page_no-1) * $total_records_per_page;

  $previous_page = $page_no - 1;
  $next_page = $page_no + 1;

  $adjacents = "2";

  $total_no_of_pages = ceil($total_records/$total_records_per_page);

  //4. Get products
  
  $stmt2 = $conn->prepare("SELECT * FROM products LIMIT $offset,$total_records_per_page");
  $stmt2->execute();
  $products = $stmt2->get_result();

   


}




?>

<?php include('layout/header.php'); ?>


    <!--Search -->

   
    <div style="width: 100%; display: flex; justify-content: space-between; ">

    <section class="my-4 py-3 " id="search" style="width: 20%;">
      <div class="container mt-5 py-5">
        <h3 class="my-2" style="font-size:20px;">Search Products</h3>
        <hr>
      </div>

      <form action="shop.php" method="POST">
        <div class="row mx-auto container">
          <div class="col-lg-12 col-md-12 col-sm-12">

            <h4 style="font-size:16px;">Category</h4>
            <div class="form-check">
            <input type="radio" class="form-check-input" value="computer" name="category" id="category_one" <?php if(isset($category) && $category=='computer'){echo "checked";} ?>>
            <label for="flexRadioDefault" class="form-check-label">
              Computers
            </label>
            </div>
            <div class="form-check">
              <input type="radio" class="form-check-input" value="phone" name="category" id="category_two" <?php if(isset($category) && $category=='phone'){echo "checked";} ?>>
              <label for="flexRadioDefault" class="form-check-label">
                Phones
              </label>
            </div>
            <div class="form-check">
              <input type="radio" class="form-check-input" value="watch" name="category" id="category_two" <?php if(isset($category) && $category=='watch'){echo "checked";} ?>>
              <label for="flexRadioDefault" class="form-check-label">
                Watches
              </label>
            </div>
            <div class="form-check">
              <input type="radio" class="form-check-input" value="speaker" name="category" id="category_two" <?php if(isset($category) && $category=='speaker'){echo "checked";} ?>>
              <label for="flexRadioDefault" class="form-check-label">
                Speakers and Earphones
              </label>
            </div>
            <div class="form-check">
              <input type="radio" class="form-check-input" value="peripheral" name="category" id="category_two" <?php if(isset($category) && $category=='peripheral'){echo "checked";} ?>>
              <label for="flexRadioDefault" class="form-check-label">
                Other Peripherals
              </label>
            </div>
          </div>
        </div>

        <div class="row mx-auto container mt-5">
          <div class="col-lg-12 col-md-12 col-sm-12">

            <h4 style="font-size:16px;">Price</h4>
            <input type="range" name="price" value="<?php if(isset($price)){echo $price;}else{echo "100";} ?>" class="form-range w-50" min="1" max="2000" id="customRange2">
            <div class="250">
              <span style="float: left;">1</span>
              <span style="float: right;">2000</span>
            </div>
          </div>
        </div>

        <div class="form-group my-3 mx-3">
          <input type="submit" name="search" value="Search" class="btn btn-primary">
        </div>
      </form>
    </section>


<!--  all products shop -->
      <section id="featured shop" class="my-5 pb-5" style="width: 79%; padding-left: 5%;">
        <div class="container text-left mt-5 py-5">
          <h3>Our Products</h3>
          <hr>
          <p>Here you can check out our products</p>
        </div>

        <div class="row container-fluid">

        <?php while($row= $products->fetch_assoc()){ ?>

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
            <h4 class="p-price">$<?php echo $row['product_price']; ?></h4>
            <a class="shop-buy-btn" href="<?php echo "single_product.php?product_id=".$row['product_id'];  ?>" >Buy Now</a>
          </div>

          <?php } ?>


          <nav aria-label="page navigation example">
            <ul class="pagination mx-auto mt-5">
                <li class="page-item <?php if($page_no<=1){echo 'disabled';} ?> ">
                  <a class="page-link" href="<?php if($page_no <= 1){echo '#'; }else{echo "?page_no=".($page_no-1);} ?>">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
                <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>
                
                <?php if($page_no>=3){ ?>
                  <li class="page-item"><a class="page-link" href="#">...</a></li>
                  <li class="page-item"><a class="page-link" href="<?php echo "?page_no=".($page_no); ?>"><?php echo $page_no; ?></a></li>
                
                <?php } ?>

                <li class="page-item <?php if($page_no >= $total_no_of_pages){echo 'disabled';} ?>">
                  <a class="page-link" href="<?php if($page_no >= $total_no_of_pages){echo '#';}else{echo "?page_no=".($page_no+1);} ?>">Next</a>
                </li>
            </ul>
          </nav>

        </div>
      </section>

    </div>


<?php include('layout/footer.php'); ?>
  