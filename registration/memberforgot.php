<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);
$alert = '';

if (isset($_POST['submit'])) {
	$memberid = $_POST['username'];
	$email = $_POST['email'];

	// Database connection
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "gym";

	// Establish a connection to the database
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check if the connection was successful
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// Construct the SQL SELECT statement to check if the user's details exist
	$checkUserQuery = "SELECT * FROM Members WHERE MemberID = '$memberid' AND Email = '$email'";

	// Execute the SQL SELECT statement
	$result = $conn->query($checkUserQuery);

	if ($result->num_rows > 0) {
		// User's details exist in the database, proceed with registration and email sending
		try {
			// SMTP configuration
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'technical.utechackathonalpha@gmail.com'; // Replace with your Gmail address
			$mail->Password = 'tjqifitkxiyweebo'; // Replace with your Gmail password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
			$mail->Port = 587;

			// Sender and recipient
			$mail->setFrom('technical.utechackathonalpha@gmail.com'); // Replace with your Gmail address
			$mail->addAddress('technical.utechackathonalpha@gmail.com'); // Replace with recipient email address

			// Email content
			$mail->isHTML(true);
			$mail->Subject = 'New Member Password Reset Alert  Received (Forgot Password Member Page)';
			$mail->Body = "<h3> Member ID: $userid<br>Email :  $email</h3>";

			$mail->send();

			// Continue with the rest of the registration process here...

			// Construct the SQL INSERT statement
			$sql = "INSERT INTO MemberPasswordReset (MemberID, Email)
                    VALUES ('$memberid', '$email')";

			// Execute the SQL INSERT statement
			if ($conn->query($sql) === TRUE) {
				// Registration and email sending were successful

				$alert = '<div data-aos="zoom-in-up" class="forgot-password-alert py-1 m-4 rounded-lg bg-gray-300  h-auto">
				<h2 class="text-center text-xl sm:text-2xl lg:text-4xl m-4 tracking-tight font-extrabold">Password Reset<span class="text-red-700"> Confirmation</span></h2>
				<div class="p-3 text-sm sm:text-base">
					<p class="mb-4 text-black">Your password reset request has been successfully processed!</p>
	
					<p class="mb-4 font-medium">When the admin initiates a password reset, an email will be sent to your registered email address with a new temporary password. Please check your email.</p>
					<h3 class="text-xl md:text-lg font-bold mb-2 text-black">Follow these steps:</h3>
					<ol class="p-2 text-sm sm:text-base font-semibold ">
						<li class="ml-2 text-black">(1) Check your email for the new temporary password.</li>
						<li class="ml-2 text-black ">(2) Login using the temporary password.</li>
						<li class="ml-2 text-black ">(3) Upon successful login, update your password to something secure.</li>
					</ol>
					<h3 class="text-xl md:text-lg font-bold mt-4 text-red-700">For any further assistance, please feel free to contact us:</h3>
					<ul class="p-2 text-sm sm:text-base font-semibold">
						<li class="ml-2 text-black font-semibold ">E-mail: <span class="font-medium">utsavwagle508@gmail.com</span></li>
						<li class="ml-2 text-black font-semibold">Phone: <span class="font-medium">+977 98698965451 </span></li>
						<li class="ml-2 text-black font-semibold">Address: <span class="font-medium">Bharatpur-11, U-TEC Chowk, Bharatpur 44200</span></li>
					</ul>
				</div>
			</div>';
			} else {
				// If there is an error with the query, display the error message
				$alert = '<div class="alert-error">
                            <span>Error: ' . $conn->error . '</span>
                          </div>';
			}
		} catch (Exception $e) {
			$alert = '<div class="alert-error">
                        <span>' . $e->getMessage() . '</span>
                      </div>';
		}
	} else {
		// User's details do not exist in the database, display an error message
		$alert = '
		<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md flex justify-between items-center mb-4">
			<span>
				We\'re sorry, but the user details you provided do not match our records. Please double-check the information you entered and try again. If you continue to face issues, please contact our support team for assistance.
			</span>
			<button class="text-red-700 hover:text-red-900 text-2xl" onclick="location.reload();">×</button>
		</div>';
	}

	// Close the database connection
	$conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Member Forgot | Gymnasium Management System</title>

	<!-- LINK SECTION  -->

	<!-- FAVICON LINK  -->
	<link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="./assets/favicon/site.webmanifest">
	<link rel="mask-icon" href="./assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	<link rel="icon" type="image/png" sizes="32x32" href="../assets/logo/logo (1).png">
	<!-- FAVICON LINK END -->


	<!-- CDN AND CSS LINK  -->
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" href="../assets/style/style.css">
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
				<img src="../assets/image/logo.png" alt="Gymnasium Management System" srcset="">
			</div>
			<ul class="links">
				<li><a class="active" href="../index.php">Home</a></li>
				<li><a href="../about.php">About Us</a></li>
				<li><a href="../membership.php">Membership</a></li>
				<li><a href="../contact.php">Contact Us</a></li>
			</ul>
			<a href="../login.php" class="action-btn">Login</a>
			<div class="toggle_btn">
				<i class="fa-solid fa-bars "></i>
			</div>
		</div>

		<!--  MEDIA QUERY DROPDOWN -->
		<div class="dropdown_menu ">
			<li><a href="../index.php">Home</a></li>
			<li><a href="../about.php">About Us</a></li>
			<li><a href="../membership.php">Membership</a></li>
			<li><a href="../contact.php">Contact Us</a></li>
			<a href="../login.php" class="action-btn">Login</a>
		</div>
		<!--  MEDIA QUERY DROPDOWN END-->
	</nav>
	<!-- NAVBAR  CONTAINER END -->




	<!-- FORGOT PASSWORD CONTAINER -->
	<div class="forgot-password-container">
		<?php echo $alert; ?>
		<div class="flex items-center justify-center min-h-screen bg-gray-300">

			<div class="w-full max-w-xl">
				<div class="md:bg-white md:shadow-md rounded-lg px-8 py-8">
					<img src="../assets/image/logo.png" alt="" class="invisible sm:visible">

					<div class="text-center my-8">
						<h1 class="text-4xl font-bold text-black py-2">FORGOT PASSWORD</h1>
						<h2 class="text-2xl font-bold text-red-700">Recover Your Member Account</h2>
					</div>

					<!-- FORGOT PASSWORD FORM -->
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
						<div class="mb-4">
							<label for="username" class="block mb-2 text-sm md:text-lg font-medium text-black">User ID</label>
							<input name="username" type="text" class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" placeholder="User ID" required>
						</div>
						<div class="mb-4">
							<label for="email" class="block mb-2 text-sm md:text-lg font-medium text-black">Email</label>
							<input name="email" type="email" class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" placeholder="Email" required>
						</div>
						<div class="button">
							<input type="submit" name="submit" value="Submit" class="h-10  py-2 px-4 rounded text-black text-lg font-semibold bg-gray-200 hover:bg-black hover:text-white cursor-pointer">
						</div>
					</form>
					<!-- FORGOT PASSWORD FORM END -->

					<div class="text-center text-black md:text-lg">
						Remember your password? <a href="../login.php" class="text-red-700 font-bold hover:text-black">Sign In</a>
					</div>
					<div class="text-center text-black md:text-lg">
						New To GMS? <a href="./registration.php" class="text-red-700 font-bold hover:text-black">Register Here</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- FORGOT PASSWORD CONTAINER END -->









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
						<li><a href="../index.php">Home</a></li>
						<li><a href="../about.php">About Us</a></li>
						<li><a href="../membership.php"> Membership</a></li>
						<li><a href="../contact.php">Contact Us</a></li>
						<li><a href="../login.php">login in</a></li>

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
	<script src="../assets/javascript/navbar.js"></script>
	<!--  JAVASCRIPT LINK SECTION END -->


</body>

</html>