<!-- DB connection -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
require 'smtp/PHPMailerAutoload.php';

function sendMail($formData)
{
  $mail = new PHPMailer(true);

  try {
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'kdemo4243@gmail.com';
    $mail->Password = 'lnyh mjcp ukeb snjd';

    // Sender and recipient
    $mail->setFrom('kdemo4243@gmail.com');
    //   $mail->addAddress('sudhanshu.sharma@swastisolutions.com'); // Admin email address
    $mail->addAddress('kdemo4243@gmail.com');

    // Email content
    $mail->isHTML(true);
$mail->Subject = 'New Contact Form Submission';
$mail->Body = "
    <div style='font-family: Arial, sans-serif; color: #333; background-color: #f9f9f9; padding: 20px; border-radius: 5px;'>
        <div style='text-align: center; background-color: #4CAF50; padding: 15px; border-radius: 5px; color: white;'>
            <h2 style='margin: 0;'>New Contact Form Enquiry</h2>
        </div>
        <div style='padding: 20px; background-color: white; margin-top: 10px; border: 1px solid #ddd; border-radius: 5px;'>
            <p style='font-size: 16px; margin-bottom: 10px;'>
                <strong style='color: #4CAF50;'>Full Name:</strong> {$formData['fullname']}
            </p>
            <p style='font-size: 16px; margin-bottom: 10px;'>
                <strong style='color: #4CAF50;'>Email:</strong> {$formData['email']}
            </p>
            <p style='font-size: 16px; margin-bottom: 10px;'>
                <strong style='color: #4CAF50;'>Phone:</strong> {$formData['phone']}
            </p>
            <p style='font-size: 16px; margin-bottom: 10px;'>
                <strong style='color: #4CAF50;'>Message:</strong><br>
                <span style='color: #555;'>{$formData['message']}</span>
            </p>
        </div>
        <div style='text-align: center; margin-top: 20px; padding: 10px; background-color: #333; color: white; border-radius: 5px;'>
            <p style='margin: 0;'>This email was generated from a contact form submission on dharmikanushthan .</p>
        </div>
    </div>
";

    $mail->AltBody = "
            Full Name: {$formData['fullname']}
            Email: {$formData['email']}
            Phone: {$formData['phone']}
            Message: {$formData['message']}
        ";

    // Send email
    $mail->send();
    return true;
  } catch (Exception $e) {
    return false;
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $formData = [
    'fullname' => $_POST['fullname'],
    'email' => $_POST['email'],
    'phone' => $_POST['phone'],
    'message' => $_POST['message']
  ];

  if (sendMail($formData)) {
    $message = 'Message has been sent';
  } else {
    $message = 'Message could not be sent.';
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>

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

    

    <section class="bg-light py-3 py-md-5">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
            <h2 class="mb-4 display-5 text-center">Contact Us</h2>
            <p class="text-dark fw-bold mb-5 text-center">हमसे संपर्क करने के लिए नीचे दिए गए संपर्क फ़ॉर्म को भरें। सभी
              आवश्यक जानकारी भरें, और हम जल्द से जल्द आपकी सहायता के लिए आपसे संपर्क करेंगे।</p>
            <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row justify-content-lg-center">
          <div class="col-12 col-lg-9">
            <div class="bg-white border rounded shadow-sm overflow-hidden">

              <?php if (isset($message)): ?>
                <div class="alert alert-info"><?php echo $message; ?></div>
              <?php endif; ?>

              <form action="" method="POST">
                <div class="row gy-4 gy-xl-5 p-4 p-xl-5">
                  <div class="col-12">
                    <label for="fullname" class="form-label">Full Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="" required>
                  </div>
                  <div class="col-12 col-md-6">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <div class="input-group">
                      <span class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-envelope" viewBox="0 0 16 16">
                          <path
                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                        </svg>
                      </span>
                      <input type="email" class="form-control" id="email" name="email" value="" required>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <label for="phone" class="form-label">Phone Number</label>
                    <div class="input-group">
                      <span class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-telephone" viewBox="0 0 16 16">
                          <path
                            d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg>
                      </span>
                      <input type="tel" class="form-control" id="phone" name="phone" value="" required>
                    </div>
                  </div>
                  <div class="col-12">
                    <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                  </div>
                  <div class="col-12">
                    <div class="d-grid">
                      <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- last child or footer -->
    <!-- include footer  -->
    <?php
    include("includes/footer.php")
      ?>

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

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>