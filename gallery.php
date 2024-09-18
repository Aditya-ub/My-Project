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
  <title>Dharmik Anushtan-Gallery</title>

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
              <a class="nav-link" href="cart.php" id="nav-link"><i
                  class="fa-solid fa-gopuram"></i><sup><?php cart_total_number(); ?></sup></a>
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
              <input type="search" id="search-input" placeholder="Search" aria-label="Search" name="search_data_puja">
              <button class="search-btn" onclick="performSearch()">
                <i class="fa-solid fa-search"></i>
              </button>
            </form>
          </div>

          <!-- Account Dropdown -->
          <div class="dropdown ms-4">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle account-icon" href="#" id="accountDropdown" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa-solid fa-user"></i> <!-- Account Icon -->
                  <span
                    class="login-text"><?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Login'; ?></span>
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

    <!-- Start Slideshow Button -->
    <div class="d-flex justify-content-center align-items-center" style="height: 7vh;">
      <button type="button" class="btn btn-warning mt-4" data-bs-toggle="modal" data-bs-target="#slideshowModal">
        Start Slideshow
      </button>
    </div>

    <!-- Modal for Slideshow -->
    <div class="modal fade" id="slideshowModal" tabindex="-1" aria-labelledby="slideshowModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="slideshowModalLabel">Gallery Slideshow</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <?php
                $get_images = "SELECT * FROM gallery_images ORDER BY uploaded_at DESC";
                $result_images = mysqli_query($con, $get_images);
                $first = true; // Flag to mark the first image as active
                
                while ($row = mysqli_fetch_assoc($result_images)) {
                  $image_path = $row['image_path'];
                  $activeClass = $first ? 'active' : ''; // Make the first image active
                  $first = false; // Set the flag to false after the first iteration
                  echo "
                <div class='carousel-item $activeClass'>
                  <img src='admin/gallery_images/$image_path' class='d-block w-100' alt='img'>
                </div>
              ";
                }
                ?>
              </div>
              <!-- Carousel controls -->
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- second child -->

    <div class="gallery">

      <?php
      $get_images = "SELECT * FROM gallery_images ORDER BY uploaded_at DESC";
      $result_images = mysqli_query($con, $get_images);

      while ($row = mysqli_fetch_assoc($result_images)) {
        $image_path = $row['image_path'];
        echo "<img src='admin/gallery_images/$image_path' alt='img'>";
      }
      ?>
      <img src="images/naag1.jpg" alt="img">
      <img src="images/rashipuja3.webp" alt="img">
      <img src="images/n4.jpg" alt="img">
      <img src="images/havan3.webp" alt="img">

      <img src="images/img13.jpg" alt="img">
      <img src="images/n6.jpg" alt="img">
      <img src="images/img9.jpg" alt="img">
      <img src="images/img16.jpg" alt="img">

      <img src="images/img4.webp" alt="img">

      <img src="images/img3.jpg" alt="img">
      <img src="images/img11.jpeg" alt="img">
      <img src="images/img14.jpg" alt="img">
      <img src="images/img11.jpeg" alt="img">
      <img src="images/img8.jpeg" alt="img">



      <img src="images/img4.jpg" alt="img">
      <img src="images/img2.jpg" alt="img">
      <img src="images/s4.jpg" alt="img">
      <img src="images/anushtan2.jpeg" alt="img">
      <img src="images/i1.jpg" alt="img">
      <img src="images/img15.png" alt="img">







    </div>

    <?php
    include("includes/footer.php")
      ?>
    <!-- <div class="bg-secondary bg-gradient p-3 text-center ">
    <p style="color:black; font-size: 18px;">All Rights Reserved © Swasti Solutions</p>
 </div> -->
  </div>

  <!-- bootstrap js link  -->



  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

</body>

</html>