<?php include('layout/header.php'); ?>

<?php


if(isset($_POST['order_pay_btn'])){
    $order_status = $_POST['order_status'];
    $order_total_price = $_POST['order_total_price'];
}



?>


      <!-----Payment----->

      <section class="my-5 py-5">
            <div class="container text-center mt-3 pt-5">
                <h2 class="form-weight-bold">Payment</h2>
                <hr class="mx-auto">
            </div>
            <div class="mx-auto container text-center">

            <?php if(isset($_POST['order_status']) && $_POST['order_status'] =="not paid" ){?>

            <?php $amount = $_POST['order_total_price']; ?>
            <?php $order_id = $_POST['order_id']; ?>
            <p>Total payment: $<?php echo $_POST['order_total_price']; ?></p>

            <form action="server/complete_payment.php" method="POST">
                <input type="hidden" name="order_id" value="<?php echo $_POST['order_id']; ?>"/>
                <input type="hidden" name="transaction_id" />
                <input type="submit" class="btn btn-primary" name="payNow" value="Pay now"/>
            </form>

            <?php }else if(isset($_SESSION['total']) && $_SESSION['total'] !=0 ) { ?>
            <?php  $amount = $_SESSION['total'];  ?>
            <?php $order_id = $_SESSION['order_id']; ?>
            <p>Total payment: $<?php echo $_SESSION['total']; ?></p>

            <form action="server/complete_payment.php" method="POST">
                <input type="hidden" name="order_id" value="<?php echo $_SESSION['order_id']; ?>">
                <input type="hidden" name="transaction_id" />
                <input type="submit" class="btn btn-primary" name="payNow" value="Pay now"/>
            </form>
  
                <?php }else{?>

                    <p>You don't have an order</p>

                    <?php } ?>
                
            </div>
        </section>






<?php include('layout/footer.php'); ?>