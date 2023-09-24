<?php
$alert = ''; // Initialize the $alert variable

if (isset($_POST['login'])) {
	// Connect to the database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "gym";

	$conn = new mysqli($servername, $username, $password, $database);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	function validate_form($data)
	{
		$data = trim($data); // Remove leading and trailing whitespace
		$data = stripslashes($data); // Remove backslashes
		$data = htmlspecialchars($data); // Convert special characters to HTML entities
		return $data;
	}

	$adminID = validate_form($_POST['adminID']); // Sanitize adminID
	$password = md5(validate_form($_POST['password'])); // Sanitize and hash the password using md5

	$sql = "SELECT * FROM Admins WHERE AdminID = '$adminID' AND LoginPassword = '$password' ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			session_start();
			$_SESSION['admin_id'] = $row['AdminID'];
			header("Location: http://localhost/GMS/admin/dashboard.php"); // Redirect after successful login
			exit(); // Terminate the script after redirect
		}
	} else {
		$alert = '
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md flex justify-between items-center mb-4">
            <span>
			We\'re sorry, but the admin details you provided do not match our records. Please double-check the information you entered and try again. If you continue to face issues, please contact our support team for assistance.

            </span>
            <button class="text-red-700 hover:text-red-900 text-2xl" onclick="location.reload();">×</button>
        </div>';
	}

	$conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Login | Gymnasium Management System</title>

	<!-- LINK SECTION  -->

	<!-- FAVICON LINK  -->
	<link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="./assets/favicon/site.webmanifest">
	<link rel="mask-icon" href="./assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	<link rel="icon" type="image/png" sizes="32x32" href="./assets/logo/logo (1).png">
	<!-- FAVICON LINK END -->


	<!-- CDN AND CSS LINK  -->
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" href="./assets/style/style.css">
	<!-- CDN AND CSS LINK END -->

	<!-- LINK SECTION  ENDS -->


</head>

<body>
	<!-- HEADER CONTAINER  -->
	<header>
		<div class="header-info">
			<div class="location">
				<i class="fas fa-map-marker-alt"></i>
				<span>Bharatpur-11, U-TEC Chowk , Chitwan</span>
			</div>
			<div class="phone">
				<i class="fas fa-phone"></i>
				<span> <a href="tel:+977-9865252767">9869896545 </a></span>
			</div>
			<div class="opening-hours">
				<i class="fas fa-clock bx-x"></i>
				<span>Sun-Fri: 5:00 AM - 9:00 PM</span>
			</div>
		</div>
	</header>
	<!-- HEADER CONTAINER  END -->


	<!-- NAVBAR CONTAINER  -->

	<nav>
		<div class="navbar">
			<div class="logo">
				<img src="./assets/image/logo.png" alt="Gymnasium Management System" srcset="">
			</div>
			<ul class="links">
				<li><a class="active" href="./index.php">Home</a></li>
				<li><a href="./about.php">About Us</a></li>
				<li><a href="./membership.php">Membership</a></li>
				<li><a href="./contact.php">Contact Us</a></li>
			</ul>
			<a href="./login.php" class="action-btn">Login</a>
			<div class="toggle_btn">
				<i class="fa-solid fa-bars "></i>
			</div>
		</div>

		<!--  MEDIA QUERY DROPDOWN -->
		<div class="dropdown_menu ">
			<li><a href="./index.php">Home</a></li>
			<li><a href="./about.php">About Us</a></li>
			<li><a href="./membership.php">Membership</a></li>
			<li><a href="./contact.php">Contact Us</a></li>
			<a href="./login.php" class="action-btn">Login</a>
		</div>
		<!--  MEDIA QUERY DROPDOWN END-->
	</nav>
	<!-- NAVBAR  CONTAINER END -->


	<!-- LOGIN CONTAINER  -->

	<div class="login-container">
		<?php echo $alert; ?>

		<div class="flex md:items-center justify-center min-h-screen  bg-gray-300">
			<div class="w-full max-w-xl ">
				<div class="md:bg-white md:shadow-md rounded-lg px-8 py-8">
					<img src="./assets/image/logo.png" alt="" class="invisible sm:visible">
					<div class="text-center my-8">
						<h1 class="text-4xl font-bold text-black py-2"> ADMIN LOGIN</h1>
						<h2 class="text-2xl font-bold text-red-700 ">Welcome <span class="text-black">Back</span></h2>
					</div>
					<!-- ADMIN FORM  -->
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

						<div class="mb-4">
							<label for="username" class="block mb-2 text-sm  md:text-lg font-medium text-black">Admin
								ID</label>
							<input id="username" type="text" name="adminID" class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded " placeholder="Admin ID">
						</div>
						<div class="mb-6">
							<label for="password" class="block mb-2 text-sm  md:text-lg font-medium text-black">Password</label>

							<input id="passwordInput" type="password" name="password" class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" placeholder="Password" />
							<div class="m-2">
								<input type="checkbox" id="showPasswordToggle" onchange="togglePasswordVisibility()" />
								<label for="showPasswordToggle">Show Password</label>

							</div>

						</div>
						<div class="flex items-center justify-between mb-6">
							<a href="./registration/adminforgot.php" class="text-black md:text-lg  hover:text-red-700">Forgot Password?</a>
							<button name="login" class="bg-gray-200  text-black font-bold py-2 px-4 rounded md:text-lg hover:text-white hover:bg-black ">Sign
								In</button>
						</div>
					</form>
					<!-- ADMIN FORM  -->
					<div class="text-center text-black md:text-lg">
						Not A Admin? <a href="./login.php" class="text-red-700 font-bold hover:text-black">User
							Login</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- LOGIN CONTAINER END  -->








	<!--  FOOTER CONTAINER -->
	<footer class="footer">
		<div class="container">
			<div class="row">

				<!-- LOCATION  -->
				<div class="footer-col">
					<h4>Our Location</h4>
					<ul>
						<li><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.8429658921636!2d84.44191491506172!3d27.691247982798586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3994e4c950356f59%3A0x9f16980dc6bd57b4!2sUnited%20Technical%20College!5e0!3m2!1sen!2snp!4v1626505314807!5m2!1sen!2snp" width="200" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
						</li>

					</ul>
				</div>
				<!-- LOCATION END  -->

				<!-- CONTACT US -->
				<div class="footer-col">
					<h4>Contact-us</h4>
					<ul>
						<li><a href="tel: +977 9869896545 , 9826235532"><b> <u> Phone Number</b></u>: +977
								9869896545 ,9826235532</a></li>
						<li><a href="mailto: utsavwagle123456789@gmail.com"><b><u>Email:</u></b>
								utsavwagle123456789@gmail.com </a></li>
						<li><a href="mailto:  utsavwagle508@gmail.com"><b><u>Email:</u></b>
								utsavwagle508@gmail.com</a></li>

					</ul>
				</div>
				<!-- CONTACT US END  -->

				<!-- QUICK LINK  -->
				<div class="footer-col">
					<h4>Quick Links</h4>
					<ul>
						<li><a href="./index.php">Home</a></li>
						<li><a href="./about.php">About Us</a></li>
						<li><a href="./membership.php"> Membership</a></li>
						<li><a href="./contact.php">Contact Us</a></li>
						<li><a href="./login.php">login in</a></li>

					</ul>
				</div>

				<!-- QUICK LINKS END  -->

				<!-- SOCIAL LINK  -->
				<div class="footer-col">
					<h4>follow us</h4>
					<div class="social-links">
						<a href="https://www.facebook.com/4nonymous.Hunter.109" target="_blank" id="facebook"><i class="fab fa-facebook-f"></i></a>
						<a href="https://www.instagram.com/utsav_wagle/" target="_blank" id="instagram"><i class="fab fa-instagram"></i></a>
						<a href="https://www.linkedin.com/in/utsav-wagle-a4847a270/" target="_blank" id="linkedin"><i class="fab fa-linkedin"></i></a>

						<a href="https://github.com/Hunter109" target="_blank" id="github"><i class=" fab fa-github"></i></a>
					</div>
				</div>
				<!-- SOCIAL LINK END  -->
			</div>
		</div>
		<!-- COPYRIGHT  -->
		<div class="footer-text">
			copyright&copy; all rights reserved,<a href="https://github.com/Hunter109" target="_blank">Gymnasium
				Management System
			</a>
		</div>
		<!-- COPYRIGHT END -->

	</footer>

	<!-- FOOTER CONTAINER END  -->


	<!-- JAVASCRIPT LINK SECTION -->
	<script type="text/javascript">
		if (window.history.replaceState) {
			window.history.replaceState(null, null, window.location.href);
		}
	</script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script src="./assets/javascript/navbar.js"></script>
	<!--  JAVASCRIPT LINK SECTION END -->



</body>

</html>