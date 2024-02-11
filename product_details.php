<!-- connect file -->

<?php 
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocery 2 Go</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css file -->
    <link rel="stylesheet" href="./style.css">

</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <img src="./images/logo.png" alt=""  class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: $<?php total_cart_price(); ?></a>
        </li>
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-success" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!-- Calling cart function -->
<?php
cart();
?>
        
<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
    <?php
        if(!isset($_SESSION['username'])){

          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
          </li>  ";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
          </li>";
        }
        ?> 
        <?php
        if(!isset($_SESSION['username'])){

          echo "<li class='nav-item'>
              <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                </li> ";
        }else{
          echo "<li class='nav-item'>
              <a class='nav-link' href='./users_area/logout.php'>Logout</a>
                </li> ";
        }
        ?> 
    </ul>
</nav>

<!-- third child -->
<div class="bg-light mb-4">
    <h3 class="text-center border rounded-3 border-success w-25 m-auto mt-3 shadow-lg bg-body rounded-bottom text-dark">More Info</h3>
    
</div>


<!-- fourth child -->
<div class="row px-3">
    <div class="col-md-10">
        <!-- All Products -->
        <div class="row">

        <!-- Fetching products -->
        <?php 

        // calling function
        view_details();
        get_unique_categories();
        get_unique_subcategories();

        ?>
        </div>
        <!-- col end -->
    </div>
    
    <div class="col-md-2 bg-secondary p-0">
        <!-- Side Navbar -->

        <!-- Categories to be displayed -->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-dark">
                <a href="#" class="nav-link text-light"><h4>Category</h4></a>
            </li>
            <?php 
            
            // calling function
            getCategory();

            ?>
        </ul>

        <!-- Sub-Categories to be displayed -->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-dark">
                <a href="#" class="nav-link text-light"><h4>Sub category</h4></a>
            </li>
            <?php 
            
            //calling function
            getSubCategory();
            
            
            ?>
        </ul>
    </div>
    
</div>



<!-- last child -->
<!-- include footer -->
<?php 
include('./includes/footer.php');
?>



<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>