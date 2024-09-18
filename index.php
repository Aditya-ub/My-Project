<!-- DB connection -->
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
  <link rel="icon" href="images/logo5.png" type="image/png">
    <meta name="description"
    content="Dharmik Anushtan helps you book Hindu rituals and pujas online. Explore our services and make your spiritual journey easier.">
  <meta name="keywords"
    content="Dharmik Anushtan, book pujas, Hindu rituals, online puja booking, spiritual services, Hindu ceremonies">
  <meta property="og:title" content="Dharmik Anushtan - Book Hindu Pujas & Rituals Online">
  <meta property="og:description"
    content="Dharmik Anushtan helps you book Hindu rituals and pujas online. Explore our services and make your spiritual journey easier.">
  <meta property="og:image" content="images/DAshare1.jpg">
  <meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
  <meta property="og:url" content="https://dharmikanushthan.com/">
  <title>Dharmik Anushtan-Home</title>

  <!-- bootstrap css link -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- font awesome link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- css file -->

  <link rel="stylesheet" href="style.css">

  <!-- logout confirmation script  -->
  <script>
function confirmLogout() {
  var confirmAction = confirm("Are you sure you want to logout?");
  if (confirmAction) {
    window.location.href = "user/user_logout.php";
  }
}
</script>
<script>
function toggleSearch() {
var input = document.getElementById('search-input');
input.classList.toggle('open');
if (input.classList.contains('open')) {
  input.focus(); // Focus on input when opened
} else {
  input.value = ''; // Clear input value when closed
}
}

function performSearch() {
var searchInput = document.getElementById('search-input');
if (searchInput.value) {
  searchInput.form.submit(); // Submit the search form
}
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
var loginDropdownItem = document.getElementById('loginDropdownItem');

// Add click event listener to the login dropdown item
if (loginDropdownItem) {
    loginDropdownItem.addEventListener('click', function () {
        window.location.href = 'user/user_login.php'; // Redirect to login page
    });
}

// Add click event listener to the login text
var loginText = document.querySelector('.login-text');
if (loginText) {
    loginText.addEventListener('click', function () {
        if (this.textContent.trim() === 'Login') { // Check if the text is "Login"
            window.location.href = 'user/user_login.php'; // Redirect to login page
        }
    });
}
});
</script>




</head>

<body>
<!-- navbar -->
<div class="container-fluid p-0">
<!-- first-child or header -->
<nav class="navbar navbar-expand-lg" id="navbar">
<div class="container-fluid">
    <a href="index.php"><img src="images/logo_s.png" alt="logo" style="width:60px;height:60px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <!-- Home Link -->
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php" id="nav-link">Home</a>
            </li>
            <!-- Book Puja Link -->
            <li class="nav-item">
                <a class="nav-link " href="display_all.php" id="nav-link">All Pujas</a>
            </li>
            
            <!-- Contact Us Link -->
            <li class="nav-item">
                <a class="nav-link" href="form.php" id="nav-link">Contact Us</a>
            </li>
            <!-- Gallery Link -->
            <li class="nav-item">
                <a class="nav-link" href="gallery.php" id="nav-link">Gallery</a>
            </li>
            <!-- Cart Link -->
            <li class="nav-item">
                <a class="nav-link" href="cart.php" id="nav-link"><i class="fa-solid fa-gopuram" ></i><sup><?php cart_total_number(); ?></sup></a>
            </li>
            <!-- Total Payment Link -->
            <li class="nav-item">
                <a class="nav-link" href="cart.php" id="total">Your Total: ₹<?php total_payment(); ?>/-</a>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <!-- Special Offer Link -->
            
            <!-- Language Dropdown -->
            
        </ul>
        <div class="search-wrapper">
            <i class="fa-solid fa-search search-icon" onclick="toggleSearch()"></i>
            <form class="d-flex" role="search" action="search_puja.php" method="get">
                <input type="search" id="search-input"  placeholder="Search" aria-label="Search" name="search_data_puja">
                <button class="search-btn" onclick="performSearch()">
                    <i class="fa-solid fa-search"></i>
                </button>
            </form>
        </div>
        
        <!-- Account Dropdown -->
        <div class="dropdown ms-4">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle account-icon" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user"></i> <!-- Account Icon -->
                        <span class="login-text"><?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Login'; ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                        <?php if (!isset($_SESSION['username'])): ?>
                            <li><a class="dropdown-item" href="user/user_registeration.php">Sign Up</a></li>
                            <li><a class="dropdown-item" href="user/user_login.php" id="loginDropdownItem">Login</a></li>
                        <?php else: ?>
                            <li><a class="dropdown-item" href="user/profile.php">My Account</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);" onclick="confirmLogout()">Logout</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
   
</div>
</nav>

    <!-- calling cart function  -->
    <?php
    cart();
    ?>

    <!-- second child -->

    

    <!-- third child -->
    <div class="welcome">
<section >
  <!-- Top Line -->
  <div class="top-line">
    <p> अग्न आयाहि वीतये गृणानो हव्यदातये निहोता सत्सि वाहर्षि।। </p>
    <p>ईषे त्वोर्जो त्वा वायव स्थ देवो वः सविता प्रार्पयतु श्रेष्ठतमायकर्मणे</p>
  </div>

  <!-- Main Content Container -->

    <!-- Left Section -->
    <div class="left-section">
      <!-- Central Text -->
      <div class="central-text">
        <h1>धार्मिक अनुष्ठान</h1>
      </div>

      <!-- Logo -->
      <div class="logo-container">
        <div class="logo-inner">
          <img src="./images/omon7.png" alt="Logo" class="static-symbol">
        </div>
        <div class="logo-outer">
          <img src="./images/circles.png" alt="Outer Circle" class="rotating-circle">
        </div>
      </div>

      <!-- Content -->
      <div class="content-container">
        <div class="content-left">
          <div class="content">
            <p>हमारे पवित्र अनुष्ठानों और आध्यात्मिक सेवाओं का अन्वेषण करें, जो आपके आध्यात्मिक यात्रा को समृद्ध बनाने के लिए डिज़ाइन की गई हैं। हमारे द्वारा आयोजित विभिन्न अनुष्ठान आपके जीवन में शांति और समृद्धि लाने के लिए बनाए गए हैं।</p>
            <p>पारंपरिक प्रथाओं और व्यक्तिगत अनुष्ठानों के माध्यम से दिव्य ऊर्जा से जुड़ने और उत्सव मनाने के लिए हमारे साथ जुड़ें।</p>
          </div>
        </div>
      </div>
    </div> 

    <!-- Right Section -->
    <div class="right-section">
      
      <div class="background-container">
        <img src="./images/gan.jpg" class="background-image">
        <img src="./images/shankar.jpg" class="background-image">
        <img src="./images/jab.jpg" class="background-image">
        <img src="./images/ram.jpeg" class="background-image">
        <img src="./images/krishana.jpg" class="background-image">
      </div>
    </div>
  
</section>
</div>
    <br>
    <!-- <div class="bg-light">
    <h3 class="text-center">Dharmik Anushthan</h3>
    <p class="text-center">Blessings Your Way</p>
 </div> -->

    <!-- fourth child -->
    <div class="row px-1 py-2">
      <div class="col-md-10">
        <!-- Pujas -->
        <div class="row">

          <?php
          //  calling function instead of code 
          getpuja();
          get_unique_categories();
          get_unique_mod();

          //          $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip; 
          
          //         $select_query = "SELECT * FROM `pujas` order by rand() limit 0,6 " ;
//         $result_query = mysqli_query($con,$select_query);
//         while($row = mysqli_fetch_assoc($result_query)){
//          $puja_id = $row['puja_id'];
//          $puja_title = $row['puja_title'];
//          $puja_description = $row['puja_description'];
//         //  $puja_keywords = $row['puja_keywords'];
//          $puja_image1 = $row['puja_image1'];
//          $puja_price = $row['puja_price'];
//          $type_id = $row['puja_id'];
//          $mod_id = $row['mod_id'];
//          echo "<div class='col-md-4 mb-2'>
//             <div class='card' >
//   <img src='./admin/puja_images/$puja_image1' class='card-img-top' alt='$puja_title'>
//   <div class='card-body'>
//     <h5 class='card-title'>$puja_title</h5>
//     <p class='card-text'>$puja_description</p>
//     <a href='#' class='btn btn-primary'>Book Puja</a>
//     <a href='#' class='btn btn-secondary'>Know More</a>
//   </div>
// </div>
// </div>";
//       }
          ?>

          <!-- //             <div class="col-md-4 mb-2">
//             <div class="card" >
//   <img src="./images/ganeshpuja.avif" class="card-img-top" alt="...">
//   <div class="card-body">
//     <h5 class="card-title">Card title</h5>
//     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
//     <a href="#" class="btn btn-primary">Book Puja</a>
//     <a href="#" class="btn btn-secondary">Know More</a>
//   </div>
// </div>
// </div> -->


        </div> <!-- row end -->
      </div> <!-- col end  -->

      <!-- sidenav -->
      <div class="col-md-2  custom-sidebar p-0">

        <!-- Our puja categories -->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item custom-header">
            <a href="" class="nav-link">
              <h4>Categories</h4>
            </a>
          </li>

          <?php
          getcategories();
          //  $select_category = "SELECT * FROM `pujatype`" ;
          //  $result_category = mysqli_query($con,$select_category);
          //  while($row_data = mysqli_fetch_assoc($result_category)){
          //   $category_title = $row_data['type_title'];
          //   $category_id = $row_data['type_id'];
          //   echo "<li class='nav-item '>
          //     <a href='index.php?type_id=$category_id' class='nav-link '><h4>$category_title</h4></a>
          //   </li>";
          //  }
          

          //  echo $row_data['type_title'];
          ?>


        </ul>

        <!-- our mods -->

        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item custom-header">
            <a href="" class="nav-link ">
              <h4>Mode</h4>
            </a>
          </li>

          <?php

          //  $select_mod = "SELECT * FROM `addmod`" ;
          //  $result_mod = mysqli_query($con,$select_mod);
          //  while($row_data = mysqli_fetch_assoc($result_mod)){
          //   $mod_title = $row_data['mod_title'];
          //   $mod_id = $row_data['mod_id'];
          //   echo "<li class='nav-item '>
          //     <a href='index.php?mod_id=$mod_id' class='nav-link '><h4>$mod_title</h4></a>
          //   </li>";
          //  }
          getmod();

          //  echo $row_data['type_title'];
          ?>

        </ul>

      </div>

    </div>

    <!--Caraousel Start-->

    <div id="carouselExample" class="carousel slide home" data-bs-ride="carousel" style="background-color:#FFC67D"
      data-bs-interval="2000">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
          aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
          aria-label="Slide 5"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5"
          aria-label="Slide 6"></button>
      </div>

      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row">
            <div class="col-lg-4">
              <div class="card" id="card">
                <img src="images/har.jpg" class="card-image" alt="..." id="card-image">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card" id="card">
                <img src="images/mahakal mandir.jpg" class="card-image" alt="..." id="card-image">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card" id="card">
                <img src="images/shri chintaman.jpg" class="card-image" alt="..." id="card-image">
              </div>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="row">
            <div class="col-md-4">
              <div class="card" id="card">
                <img src="images/gadkalika1.jpg" class="card-image" alt="..." id="card-image">
              </div>
            </div>
            <div class="col-md-4">
              <div class="card" id="card">
                <img src="images/harsiddhi mata.jpg" class="card-image" alt="..." id="card-image">
              </div>
            </div>
            <div class="col-md-4">
              <div class="card" id="card">
                <img src="images/dewas.jpeg" class="card-image" alt="..." id="card-image">
              </div>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="row">
            <div class="col-md-4">
              <div class="card" id="card">
                <img src="./images/shiv.jpg" class="card-image" alt="..." id="card-image">
              </div>
            </div>
            <div class="col-md-4">
              <div class="card" id="card">
                <img src="images/s5.jpg" class="card-image" alt="..." id="card-image">
              </div>
            </div>
            <div class="col-md-4">
              <div class="card" id="card">
                <img src="./images/naagchandreshwar.jpg" class="card-image" alt="..." id="card-image">
              </div>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="row">
            <div class="col-md-4">
              <div class="card" id="card">
                <img src="./images/ram.jpg" class="card-image" alt="..." id="card-image">
              </div>
            </div>
            <div class="col-md-4">
              <div class="card" id="card">
                <img src="./images/mahakallok.jpg" class="card-image" alt="..." id="card-image">
              </div>
            </div>
            <div class="col-md-4">
              <div class="card" id="card">
                <img src="./images/ml1.jpg" class="card-image" alt="..." id="card-image">
              </div>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="row">
            <div class="col-md-4">
              <div class="card" id="card">
                <img src="./images/KALS.jpg" class="card-image" alt="..." id="card-image">
              </div>
            </div>
            <div class="col-md-4">
              <div class="card" id="card">
                <img src="images/GANSEH.jpg" class="card-image" alt="ganesh" id="card-image">
              </div>
            </div>
            <div class="col-md-4">
              <div class="card" id="card">
                <img src="./images/isckon1.jpg" s class="card-image" alt="..." id="card-image">
              </div>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="row">
            <div class="col-md-4">
              <div class="card" id="card">
                <img src="./images/ml4.jpg" class="card-image" alt="..." id="card-image">
              </div>
            </div>
            <div class="col-md-4">
              <div class="card" id="card">
                <img src="./images/ml3.jpg" class="card-image" alt="..." id="card-image">
              </div>
            </div>
            <div class="col-md-4">
              <div class="card" id="card">
                <img src="./images/ml2.jpg" class="card-image" alt="..." id="card-image">
              </div>
            </div>
          </div>
        </div>

      </div>



      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>






    </div>
    <!-- last child or footer -->
    <!-- include footer  -->
    <div>
      <?php
      include("includes/footer.php")
        ?>
      <!-- <div class="bg-secondary bg-gradient p-3 text-center ">
    <p style="color:black; font-size: 18px;">All Rights Reserved © Swasti Solutions</p>
 </div> -->
    </div>

  </div>
  <!-- bootstrap js link  -->

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>