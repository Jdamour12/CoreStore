<?php include('layout/header.php'); ?>

<?php


include('server/connection.php');


//if user has already registered, the take user to account page
if(isset($_SESSION['logged_in'])){

    header('location: account.php');
    exit;
}


if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    //if password do not match
    if($password !== $confirmPassword){
        header('location: register.php?error=passwords do not match');
    

    //if pasword is less than 6 characters
    }else if(strlen($password) < 6 ){
        header('location: register.php?error=password must be at least 6 characters ');
   

    //if there is no error
    }else{

            //check whether the is a user with this email or not
            $stmt1 = $conn->prepare("SELECT count(*) FROM users where user_email=?");
            $stmt1->bind_param('s',$email);
            $stmt1->execute();
            $stmt1->bind_result($num_rows);
            $stmt1->store_result();
            $stmt1->fetch();

            //if there is a user already registered to this email
            if($num_rows != 0){
                header('location: register.php?error=user with this email already exists');

                //if there is no user registered with this email before
            }else{


                    //create a new user
                    $stmt = $conn->prepare("INSERT INTO users (user_name,user_email,user_password)
                                        VALUES (?,?,?)");

                    $stmt->bind_param('sss',$name,$email,$password);

                    //if account was created successfully
                    if($stmt->execute()){

                        $user_id= $stmt->inser_id;
                        $_SESSION['user_id'] = $user_id;
                        
                        $_SESSION['user_email'] = $email;
                        $_SESSION['user_name'] = $name;
                        $_SESSION['logged_in'] = true;
                        header('location: account.php?register_success=You registered successfully');

                        //account couldnot be created
                    }else{

                        header('location: register.php?error=could not create an account at the moment');

                    }
            }
       }
}

       


?>




        <!--Register-->

        <section class="my-5 py-5">
            <div class="container text-center mt-3 pt-5">
                <h2 class="form-weight-bold">Register</h2>
                <hr class="mx-auto">
            </div>
            <div class="mx-auto container">
                <form id="register-form" action="register.php" method="POST">
                    <p style="color:red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></p>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="register-name" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" class="form-control" id="register-confirm-password" name="confirmPassword" placeholder="Confirm password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="register" class="btn" id="register-btn" value="Register">
                    </div>
                    <div class="form-group">
                        <a id="login-url" class="btn" href="login.php">Do you have an account? Login</a>
                       
                    </div>
                     <a id="login-url" class="btn" href="admin/login.php">Login as Admin</a>
                </form>
            </div>
        </section>



        <?php include('layout/footer.php'); ?>