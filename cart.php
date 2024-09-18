<!-- original to this is in kdemo's gpt (fixing type error 1/8/24) -->
<!-- 2nd original to this is in kdemo's gpt (fixing type error 2/8/24) -->
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
    <title>Online Puja Services-Your Cart</title>

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- font awesome link -->
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

<style>
    /* Ensure button alignment on mobile devices */
@media (max-width: 768px) {
    .d-flex.flex-wrap {
        flex-direction: column;
        text-align: center;
    }

    .d-flex.align-items-center {
        justify-content: center;
        margin-bottom: 1rem;
    }

    #checkout-btn {
        margin-top: 1rem;
    }

    .form-control {
        width: 100% !important;
        max-width: none; /* Ensures the date picker takes full width on small screens */
    }
}

/* Adjust the date picker width on larger screens */
@media (min-width: 769px) {
    .form-control {
        width: auto;
    }

    #checkout-btn {
        margin-left: 10px;
    }
}

</style>

</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first-child or header -->
        <nav class="navbar navbar-expand-lg" id="navbar">
            <div class="container-fluid">
                <a href="index.php"><img src="images/logo_s.png" alt="logo" style="width:60px;height:60px;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
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
                            <input type="search" id="search-input" placeholder="Search" aria-label="Search"
                                name="search_data_puja">
                            <button class="search-btn" onclick="performSearch()">
                                <i class="fa-solid fa-search"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Account Dropdown -->
                    <div class="dropdown ms-4">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle account-icon" href="#" id="accountDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user"></i> <!-- Account Icon -->
                                    <span
                                        class="login-text"><?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Login'; ?></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                                    <?php if (!isset($_SESSION['username'])): ?>
                                        <li><a class="dropdown-item" href="user/user_registeration.php">Sign Up</a></li>
                                        <li><a class="dropdown-item" href="user/user_login.php"
                                                id="loginDropdownItem">Login</a></li>
                                    <?php else: ?>
                                        <li><a class="dropdown-item" href="user/profile.php">My Account</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"
                                                onclick="confirmLogout()">Logout</a></li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </nav>

        <!-- calling cart function -->
        <?php cart(); ?>





        <!-- fourth child table -->
        <div class="container my-2">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-bordered text-center">
                        <tbody>
                            <!-- php for dynamicity -->
                            <?php
                            global $con;
                            $ip = getIPAddress();
                            $total = 0;
                            $cart_query = "SELECT * FROM `cart_details` WHERE ip_address = '$ip'";
                            $result_query = mysqli_query($con, $cart_query);
                            $result_count = mysqli_num_rows($result_query);
                            if ($result_count > 0) {
                                echo "<thead>
                                <tr>
                                    <th>Puja Title</th>
                                    <th>Related Image</th>
                                    <th>Total Participants</th> 
                                    <th>Price</th>
                                    <th>Remove</th>
                                    <th colspan='2'>Operation</th>
                                </tr>
                            </thead>";
                                while ($row = mysqli_fetch_array($result_query)) {
                                    $puja_id = $row['puja_id'];
                                    $quantity = $row['quantity']; // Fetch quantity from the database
                                    if ($quantity == 0) {
                                        $quantity = 1; // Set default quantity to 1 if it is 0
                                    }
                                    $select_puja = "SELECT * FROM `pujas` WHERE `puja_id`= '$puja_id'";
                                    $result_puja = mysqli_query($con, $select_puja);
                                    while ($row_cost = mysqli_fetch_array($result_puja)) {
                                        $puja_price = $row_cost['puja_price'];
                                        $puja_title = $row_cost['puja_title'];
                                        $puja_image = $row_cost['puja_image1'];
                                        

                                        $puja_total_price = $puja_price * $quantity; // Calculate total price based on quantity
                                        $total += $puja_total_price;
                                        ?>
                                        <tr>
                                            <td><?php echo $puja_title ?></td>
                                            <td><img src="admin/puja_images/<?php echo $puja_image ?>" alt="Related Image"
                                                    class="cart_img">
                                            </td>
                                            <td><input type="number" name="qty[<?php echo $puja_id; ?>]"
                                                    class="form-input w-50 my-3" value="<?php echo $quantity; ?>"></td>
                                            
                                            <td>₹<?php echo $puja_price ?>/-</td>
                                            <td><input type="checkbox" name="remove[<?php echo $puja_id; ?>]"></td>
                                            <td>
                                                <input type="submit" value="Update"
                                                    class="btn btn-outline-success px-3 py-1 border-1 text-success-emphasis"
                                                    name="update_cart">
                                                <button
                                                    class="btn btn-outline-warning px-3 py-1 border-1 mx-1 text-warning-emphasis"
                                                    name="remove_cart">Remove</button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                            } else {
                                echo "<h2 class='text-center text-danger'>You have Not Added Any Puja to Your Cart!</h2>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- subtotal -->
                    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
                        <h4 class="px-3">Subtotal: <strong class="text-success">₹<?php echo $total ?>/-</strong></h4>
                        <a href="index.php"><button
                                class="btn btn-outline-warning px-3 py-1 border-1 mx-1 text-warning-emphasis"
                                type="button">Continue Exploring</button></a>

                        <?php if ($result_count > 0): ?>
                            <div class="mx-2 d-flex align-items-center">
                                <label for="checkout-date" class="mb-0 me-2">Select Date:</label>
                                <input type="date" id="checkout-date" name="checkout_date" class="form-control w-auto"
                                    >
                            </div>

                            <a href="user/checkout.php" id="checkout-link">
                                <button class="btn btn-outline-success px-3 py-1 border-1 text-success-emphasis"
                                    type="button" id="checkout-btn">
                                    CheckOut
                                </button>
                            </a>

                            <script>
                                document.getElementById('checkout-btn').addEventListener('click', function (event) {
                                    var selectedDate = document.getElementById('checkout-date').value;
                                    var checkoutLink = document.getElementById('checkout-link');

                                    if (!selectedDate) {
                                        event.preventDefault(); // Prevent the default action of the button
                                        alert('Please select a date before proceeding to checkout.');
                                    } else {
                                        // Append the selected date to the checkout link
                                        checkoutLink.href = "user/checkout.php?date=" + selectedDate;
                                        window.location.href = checkoutLink.href; // Proceed with the checkout redirection
                                    }
                                });
                            </script>

                        <?php endif; ?>
                    </div>

                </form>
            </div>
        </div>

        <!-- last child or footer -->
        <?php include("includes/footer.php") ?>
    </div>

    <!-- bootstrap js link -->
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

<?php
if (isset($_POST['update_cart'])) {
    foreach ($_POST['qty'] as $puja_id => $quantity) {
        $quantity = (int) $quantity; // Ensure quantity is an integer
        $update_cart = "UPDATE `cart_details` SET `quantity`='$quantity' WHERE ip_address = '$ip' AND puja_id = '$puja_id'";
        $result_puja_qty = mysqli_query($con, $update_cart);
    }
    // Refresh the page to update the subtotal
    echo "<script>window.open('cart.php', '_self')</script>";
}

if (isset($_POST['remove_cart'])) {
    foreach ($_POST['remove'] as $puja_id => $value) {
        $remove_cart = "DELETE FROM `cart_details` WHERE ip_address = '$ip' AND puja_id = '$puja_id'";
        $result_remove = mysqli_query($con, $remove_cart);
    }
    // Refresh the page to update the cart
    echo "<script>window.open('cart.php', '_self')</script>";
}
?>