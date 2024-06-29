
<?php session_start(); ?>
<?php

include('../server/connection.php');

if(isset($_SESSION['admin_logged_in'])){
    header('location: dashboard.php');
    exit;
}

if(isset($_POST['login_btn'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT admin_id,admin_name,admin_email,admin_password FROM admins WHERE admin_email=? AND admin_password=? LIMIT 1");

    $stmt->bind_param('ss',$email,$password);

    if($stmt->execute()){
 
        $stmt->bind_result($admin_id,$admin_name,$admin_email,$admin_password);
        $stmt->store_result();

        if($stmt->num_rows() == 1){
           $stmt->fetch();

           $_SESSION['admin_id'] = $admin_id;
           $_SESSION['admin_name'] = $admin_name;
           $_SESSION['admin_email'] = $admin_email;
           $_SESSION['admin_logged_in'] = true;

           header('location: dashboard.php?login_success=logged in successfully');
        }else{
            header('location: login.php?error=could not verify your account');
        }

    }else{
        //error
        header('location: login.php?error=something went wrong');

    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Core Store</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <!--navbar-->

    <section class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
      <div class="container ">
        <a class="navbar-brand" href="login.php">CS Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>  

          <ul class="navbar-nav mb-lg-0" style="font-size:14px;" >

            <li class="nav-item">
              <?php if(isset($_SESSION['admin_logged_in'])){?>
                <a class="nav-link" href="logout.php?logout=1">Signout</a>

              <?php } ?>
            </li>

          </ul>
      </div>
</section>



    
        <section class="my-5 py-5">
            <div class="container text-center mt-3 pt-5">
                <h2 class="form-weight-bold">Admin Login</h2>
                <hr class="mx-auto">
            </div>
            <div class=" container">
                <form id="login-form" method="POST" action="login.php">
                    <p style="color:red" class="text-center"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group"> 
                        <input type="submit" name="login_btn" class="btn" id="login-btn" value="login">
                        
                    </div>
                    <a id="login-url" class="btn" href="../login.php">Login as user</a>
                </form>
            </div>
        </section>

</body>
</html>