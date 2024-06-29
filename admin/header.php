<?php 
session_start(); 
include('../server/connection.php');
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

    <section class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top"style="height:10vh;">
      <div class="container ">
        <a class="navbar-brand" href="dashboard.php">CS Admin Dashboard</a>
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