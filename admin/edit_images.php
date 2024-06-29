<?php include('header.php'); ?>

<?php

if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $product_name = $_GET['product_name'];

}else{
    header('location: products.php');
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


            <h2>Update Product Image</h2>
            <div class="table-responsive">
                
                <div class="mx-auto container">


                    <form action="update_images.php" method="POST" id="edit-image-form"enctype="multipart/form-data">
                        <p style="color: red;"> <?php if(isset($_GET['error'])){echo $_GET['error']; } ?></p>

                        <input type="hidden"name="product_id" value="<?php echo $product_id; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $product_name; ?>">
                        
                        <div class="form-group mt-2">
                            <label for="">Image 1</label>
                            <input type="file" class="form-control" id="image" value="" name="image1" placeholder="Image 1"required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Image 2</label>
                            <input type="file" class="form-control" id="image" value="" name="image2" placeholder="Image 2"required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Image 3</label>
                            <input type="file" class="form-control" id="image" value="" name="image3" placeholder="Image 3"required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Image 4</label>
                            <input type="file" class="form-control" id="image" value="" name="image4" placeholder="Image 4"required>
                        </div>

                        <div class="form-group mt-2">
                            <input type="submit" class="btn btn-primary mb-5" value="Update" name="update_images">
                        </div>

                    </form>

                </div>
            </div>
        </main>

    </div>    
</div>
