<?php include('header.php'); ?>

<?php

    if(isset($_GET['product_id'])){

    $product_id = $_GET['product_id'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id=?");
    $stmt->bind_param('i',$product_id);
    $stmt->execute();

    $products = $stmt->get_result();

    }else if(isset($_POST['edit_btn'])) {

        $product_id = $_POST['product_id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $offer = $_POST['offer'];
        $color = $_POST['color'];
        $category = $_POST['category']; 
        
        $stmt = $conn->prepare("UPDATE products SET product_name=?, product_description=?, product_price=?,
                                product_special_offer=?, product_color=?, product_category=? WHERE product_id=?");
        $stmt->bind_param('ssssssi',$title,$description,$price,$offer,$color,$category,$product_id);

        if($stmt->execute()){

        header('location: products.php?edit_success_message=Product has been updated successfully');
        }else{
        header('location: products.php?edit_failure_message=Error occured, try again');

        }

    }else{
        header('products.php');
    }

    


?>


<div class="container-fluid">
    <div class="row mt-3 " style="min-height: 900px;" >

    <?php include('sidemenu.php'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5"  style="width:80%;">
            <div class="d-flex justify-content-betueen flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">

                    </div>
                </div>
            </div>


            <h2>Edit Products</h2>
            <div class="table-responsive">
                
            <div class="mx-auto container">

            </div>

            <form action="edit_product.php" method="POST" id="edit-form">
                <p style="color: red;"> <?php if(isset($_GET['error'])){echo $_GET['error']; } ?></p>
                <div class="form-group mt-2">
                    <?php foreach($products as $product){ ?>

                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                    <label for="">Title</label>
                    <input type="text" class="form-control" id="product-name" value="<?php echo $product['product_name']; ?>" name="title" placeholder="title">
                </div>
                <div class="form-group mt-2">
                    <label for="">Description</label>
                    <input type="text" class="form-control" id="product-name" value="<?php echo $product['product_description']; ?>" name="description" placeholder="Description">
                </div>
                <div class="form-group mt-2">
                    <label for="">Price</label>
                    <input type="text" class="form-control" id="product-name" value="<?php echo $product['product_price']; ?>" name="price" placeholder="price">
                </div>
                <div class="form-group mt-2">
                    <label for="">Category</label>
                    <select name="category" class="form-select" required>
                        <option value="computer">Computer</option>
                        <option value="phone">Phone</option>
                        <option value="watch">Watch</option>
                        <option value="speaker">Speaker & Earphone</option>
                        <option value="peripheral">Other Peripheral</option>
                    </select>
                    
                </div>
                <div class="form-group mt-2">
                    <label for="">Color</label>
                    <input type="text" class="form-control" id="product-name" value="<?php echo $product['product_color']; ?>" name="color" placeholder="Color">
                </div>
                <div class="form-group mt-2">
                    <label for="">Special Offer/Sale</label>
                    <input type="text" class="form-control" id="product-name" value="<?php echo $product['product_special_offer']; ?>" name="offer" placeholder="Sale %">
                </div>

                <div class="form-group mt-2">
                    <input type="submit" class="btn btn-primary" value="Edit" name="edit_btn">
                </div>

                <?php } ?>

            </form>

            </div>
        </main>

    </div>    
</div>
