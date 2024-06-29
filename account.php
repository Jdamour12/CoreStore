<?php include('layout/header.php'); ?>

<?php

include('server/connection.php');

if(!isset($_SESSION['logged_in'])){
header('location:login.php');
exit;
}

if(isset($_GET['logout'])){
    if(isset($_SESSION['logged_in'])){
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        header('location: login.php');
        exit;
    }
}


if(isset($_POST['change_password'])){

    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $user_email = $_SESSION['user_emali'];

    //if password do not match
    if($password !== $confirmPassword){
        header('location: account.php?error=passwords do not match');
    

    //if pasword is less than 6 characters
    }else if(strlen($password) < 6 ){
        header('location: account.php?error=password must be at least 6 characters ');
    
        //no errors
    }else{

        $stmt = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");
        $stmt->bind_param('ss',$password,$user_email);

        if($stmt->execute()){
            header('location: account.php?message=password has been updated successfully');
        }else{
            header('location: account.php?error=could not update password');
        }

    }
}


//get orders

if(isset($_SESSION['logged_in'])){

    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id=? ");

    $stmt->bind_param('i',$user_id);

    $stmt->execute();

    $orders = $stmt->get_result();

}


?>




        <!--Account-->

        <section class="my-5 py-5">
            <div class="row container mx-auto">

            <p class=" mt-5 text-center" style="color:green"><?php if(isset($_GET['payment_message'])){ echo $_GET['payment_message']; }?></p>

                <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                <p class="text-center" style="color:green"><?php if(isset($_GET['register_success'])){ echo $_GET['register_success']; }?></p>
                <p class="text-center" style="color:green"><?php if(isset($_GET['login_success'])){ echo $_GET['login_success']; }?></p>
                        
                    <h3 class="font-weight-bold">Account info</h3>
                    <hr class="mx-auto">
                    <div class="account-info">
                        <p>Name: <span><?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name']; } ?></span></p>
                        <p>Email: <span><?php if(isset($_SESSION['user_email'])){ echo $_SESSION['user_email']; } ?></span></p>
                        <p><a href="#orders" id="orders-btn">Your orders</a></p>
                        <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12">
                    <form action="account.php" method="POST" id="account-form">
                        <p class="text-center" style="color:red"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
                        <p class="text-center" style="color:green"><?php if(isset($_GET['message'])){ echo $_GET['message']; }?></p>
                        <h3>Change Password</h3>
                        <hr class="mx-auto">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="account-password" name="password" placeholder="Password"required/>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" class="form-control" id="account-confirm-password" name="confirmPassword" placeholder="Confirm password"required/>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="change_password" value="Change Password" class="btn" id="change-pass-btn">
                        </div>
                    </form>
                </div>
            </div>
        </section>


        <!------Orders------------>

        <section id="orders" class="orders container my-2 py-1">
            <div class="container mt-2">
                <h2 class="font-weight-bold text-center">Your Orders</h2>
                <hr class="mx-auto">
            </div>

            <div class="cart orders mt-2">
                <table class="mt-3 pt-3">
                    <tr>
                        <th>Order id</th>
                        <th>Order cost</th>
                        <th>Order status</th>
                        <th>Order Date</th>
                        <th>Order details</th>
                    </tr>


                    <?php while($row = $orders->fetch_assoc()){ ?>

                                <tr>
                                    <td>
                                      <!--  <div class="product-info">
                                            <img src="img/macbook.webp" />
                                            <div>
                                                <p class="mt-3"><?php echo $row['order_id']; ?></p>
                                                
                                            </div>
                                        </div>-->

                                        <span><?php echo $row['order_id']; ?></span>
                                    </td>    
                                    <td>
                                        <span><?php echo $row['order_cost']; ?></span>
                                    </td>

                                    <td>
                                        <span><?php echo $row['order_status']; ?></span>
                                    </td>
                                    <td>
                                        <span><?php echo $row['order_date']; ?></span>
                                    </td>

                                    <td>
                                        <form action="order_details.php"method="POST">
                                            <input type="hidden" value="<?php echo $row['order_status']; ?>" name="order_status">
                                            <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>" />
                                            <input type="submit" name="order_details_btn" class="btn order-details-btn" value="details" style="color: #fff;background-color: #fb774b;width:50%;height:50%;" />
                                        </form>
                                    </td>
                                </tr>


                    <?php } ?>


                </table>
            </div>
        </section>


<?php include('layout/footer.php'); ?>