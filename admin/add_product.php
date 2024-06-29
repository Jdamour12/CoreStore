<?php include('header.php'); ?>



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


            <h2>Create Product</h2>
            <div class="table-responsive">
                
            <div class="mx-auto container">

            </div>

            <form action="create_product.php" method="POST" id="create-form"enctype="multipart/form-data">
                <p style="color: red;"> <?php if(isset($_GET['error'])){echo $_GET['error']; } ?></p>
                <div class="form-group mt-2">

                    <label for="">Title</label>
                    <input type="text" class="form-control" id="product-name" value="" name="name" placeholder="title">
                </div>
                <div class="form-group mt-2">
                    <label for="">Description</label>
                    <input type="text" class="form-control" id="product-name" value="" name="description" placeholder="Description">
                </div>
                <div class="form-group mt-2">
                    <label for="">Price</label>
                    <input type="text" class="form-control" id="product-name" value="" name="price" placeholder="price">
                </div>
                <div class="form-group mt-2">
                    <label for="">Special Offer/Sale</label>
                    <input type="text" class="form-control" id="product-name" value="" name="offer" placeholder="Sale %">
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
                    <input type="text" class="form-control" id="product-name" value="" name="color" placeholder="Color">
                </div>
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
                    <input type="submit" class="btn btn-primary mb-5" value="Create" name="create_product">
                </div>

            </form>

            </div>
        </main>

    </div>    
</div>
