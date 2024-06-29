<?php include('header.php');?>

<?php

if(!isset($_SESSION['admin_logged_in'])){
    header('location: login.php');
    exit;
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


            <div class="container">
                <p>Id: <span><?php echo $_SESSION['admin_id']; ?></span></p>
                <p>Name: <span><?php echo $_SESSION['admin_name']; ?></span></p>
                <p>Email: <span><?php echo $_SESSION['admin_email']; ?></span></p>
            </div>
        </main>     
    </div>        
</div>  

<style>
    span{
        font-weight:bold;
        color:coral;
        font-size:17px;
        font-family:serif;
    }
</style>