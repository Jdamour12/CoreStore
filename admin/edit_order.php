<?php include('header.php');?>

<?php

if(isset($_GET['order_id'])){

    $order_id = $_GET['order_id'];
    $stmt = $conn->prepare("SELECT * FROM orders WHERE order_id=?");
    $stmt->bind_param('i',$order_id);
    $stmt->execute();

    $orders = $stmt->get_result();

}else if(isset($_POST['edit_order'])){
    $order_status = $_POST['order_status'];
    $order_id = $_POST['order_id'];
    $stmt = $conn->prepare("UPDATE orders SET order_status=? WHERE order_id=?");
    $stmt->bind_param('si',$order_status,$order_id);

    if($stmt->execute()){

        header('location: dashboard.php?order_updated=Order has been updated successfully');
    }else{
        header('location: dashboard.php?order_failed=Error occured, try again');

    }

}


?>



<div class="container-fluid">
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


            <h2>Edit Order</h2>
            <div class="table-responsive">
                
                <div class="mx-auto container">

                </div>

            <form action="edit_order.php" method="POST" id="edit-order-form">

                <?php foreach($orders as $r){ ?>

                <p style="color: red;"> <?php if(isset($_GET['error'])){echo $_GET['error']; } ?></p>
                <div class="form-group mt-2">

                    <label for="">OrderId</label>
                    <p class="my-4"><?php echo $r['order_id']; ?></p>

                
                </div>

                <input type="hidden" name="order_id" value="<?php echo $r['order_id']; ?>">
                <div class="form-group mt-2">

                    <label for="">OrderPrice</label>
                    <p class="my-4">$<?php echo $r['order_cost']; ?></p>

                </div>
                
                <div class="form-group mt-2">
                    <label for="">Order Status</label>
                    <select name="order_status" class="form-select" required>
                       
                        <option value="not paid"<?php if($r['order_status']=='not paid'){echo "selected";} ?>>Not Paid</option>
                        <option value="paid" <?php if($r['order_status']=='paid'){echo "selected";} ?>>Paid</option>
                        <option value="shipped" <?php if($r['order_status']=='shipped'){echo "selected";} ?>>Shipped</option>
                        <option value="deliverd" <?php if($r['order_status']=='delivered'){echo "selected";} ?>>Deliverd</option>
                    </select>
                    
                </div>
                <div class="form-group mt-2">

                    <label for="">OrderDate</label>
                    <p class="my-4"><?php echo $r['order_date']; ?></p>

                </div>

                <div class="form-group mt-2">
                    <input type="submit" class="btn btn-primary" value="Edit" name="edit_order">
                </div>

                <?php } ?>

            </form>

            </div>
        </main>

    </div>    
</div>
