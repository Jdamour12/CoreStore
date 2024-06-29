

<?php include('header.php'); ?>

<?php 
    if(!isset($_SESSION['admin_logged_in'])){
       header('location: login.php');
       exit;
    }
?>

<?php

//get orders

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
  $total_records_per_page = 5;

  $offset = ($page_no-1) * $total_records_per_page;

  $previous_page = $page_no - 1;
  $next_page = $page_no + 1;

  $adjacents = "2";

  $total_no_of_pages = ceil($total_records/$total_records_per_page);

  //4. Get products
  
  $stmt2 = $conn->prepare("SELECT * FROM products LIMIT $offset,$total_records_per_page");
  $stmt2->execute();
  $products = $stmt2->get_result();


?>

<div class="container-fluid ">
    <div class="row mt-3 " style="min-height: 500px;" >

<?php include('sidemenu.php'); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5"  style="width:80%;">
            <div class="d-flex justify-content-betueen flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">

                    </div>
                </div>
            </div>


            <h2>Products</h2>
                <?php if(isset($_GET['edit_success_message'])){ ?>
                <p class="text-center" style="color:green;"><?php echo $_GET['edit_success_message']; ?></p>
                <?php } ?>
                <?php if(isset($_GET['edit_failure_message'])){ ?>
                <p class="text-center" style="color:red;"><?php echo $_GET['edit_failure_message']; ?></p>
                <?php } ?>

                <?php if(isset($_GET['deleted_successfully'])){ ?>
                <p class="text-center" style="color:green;"><?php echo $_GET['deleted_successfully']; ?></p>
                <?php } ?>
                <?php if(isset($_GET['deleted_failure'])){ ?>
                <p class="text-center" style="color:red;"><?php echo $_GET['deleted_failure']; ?></p>
                <?php } ?>

                <?php if(isset($_GET['product_created'])){ ?>
                <p class="text-center" style="color:green;"><?php echo $_GET['product_created']; ?></p>
                <?php } ?>
                <?php if(isset($_GET['product_failed'])){ ?>
                <p class="text-center" style="color:red;"><?php echo $_GET['product_failed']; ?></p>
                <?php } ?>

                <?php if(isset($_GET['images_updated'])){ ?>
                <p class="text-center" style="color:green;"><?php echo $_GET['images_updated']; ?></p>
                <?php } ?>
                <?php if(isset($_GET['images_failed'])){ ?>
                <p class="text-center" style="color:red;"><?php echo $_GET['images_failed']; ?></p>
                <?php } ?>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Product Id</th>
                            <th scope="col">Product Imange</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Product Offer</th>
                            <th scope="col">Product Category</th>
                            <th scope="col">Product Color</th>
                            <th scope="col" style="width:130px;">Edit Images</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach($products as $product){ ?>
                        <tr>
                            <td><?php echo $product['product_id']; ?></td>
                            <td><img src="../img/<?php echo $product['product_image']; ?>" style="width:70px;height:60px;"></td>
                            <td><?php echo $product['product_name']; ?></td>
                            <td><?php echo "$".$product['product_price']; ?></td>
                            <td><?php echo $product['product_special_offer']."%"; ?></td>
                            <td><?php echo $product['product_category']; ?></td>
                            <td><?php echo $product['product_color']; ?></td>
                            <td><a href="<?php echo "edit_images.php?product_id=".$product['product_id']."&product_name=".$product['product_name']; ?>"class="btn btn-warning">Edit Images</a></td>
                            <td><a href="edit_product.php?product_id=<?php echo $product['product_id']; ?>" class="btn btn-primary">Edit</a></td>
                            <td><a href="delete_product.php?product_id=<?php echo $product['product_id']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

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
        </main>

    </div>    
</div>