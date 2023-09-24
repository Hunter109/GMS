<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);
$alert = '';

if (isset($_POST['submit'])) {
    $name = $_POST['full-name'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $phoneNumber = $_POST['phone-number'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $membershipPlan = $_POST['membership-plan'];
    $gender = $_POST['gender'];

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
        $mail->Subject = 'New Registration Alert  Received (Registration Page)';
        $mail->Body = '
        <html>
        <body>
            <div style="font-family: Arial, sans-serif; background-color: #f0f0f0; margin: 0; padding: 0;">
                <div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #ffffff; border: 1px solid #dddddd; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <h2 style="font-size: 24px; color: #000000; margin-bottom: 20px;">New  Member Request</h2>
                    <p><strong>Full Name:</strong> ' . $name . '</p>
                    <p><strong>Date of Birth:</strong> ' . $dob . '</p>
                    <p><strong>Phone Number:</strong> ' . $phoneNumber . '</p>
                    <p><strong>Email:</strong> ' . $email . '</p>
                    <p><strong>Address:</strong> ' . $address . '</p>
                    <p><strong>Age:</strong> ' . $age . '</p>
                    <p><strong>Gender:</strong> ' . $gender . '</p>
                    <p><strong>Membership:</strong> ' . $membershipPlan . '</p>
                </div>
            </div>
        </body>
        </html>
        ';

        $mail->send();

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

        // Construct the SQL INSERT statement
        $sql = "INSERT INTO SignUP (FullName, MobileNo, Address, Email, MembershipType, Sex, Age,DOB)
                VALUES ('$name', '$phoneNumber', '$address', '$email', '$membershipPlan', '$gender', '$age','$dob')";

        // Execute the SQL INSERT statement
        if ($conn->query($sql) === TRUE) {
            // If the query is successful, display the success message
            $alert = '<div data-aos="zoom-in-up" class="membership-rate py-1 m-4 rounded-lg bd-gray-300 md:bg-white h-auto">
                        <h2 class="text-center text-xl sm:text-2xl lg:text-4xl m-4 tracking-tight font-extrabold text-red-700">Registration<span class="text-black"> Success</span></h2>
                        <div class="p-3 text-sm sm:text-base">
                            <p class="mb-4">Thank you for registering!</p>
                            <p class="mb-4">We have successfully received your submission and are thrilled to have you as a new member of our community.</p>
                            <p class="mb-4">Our representative will review your registration details and contact you shortly to provide further instructions and complete the registration process.</p>
                            <h3 class="text-xl md:text-lg font-semibold mb-2">For any inquiries, please feel free to contact us:</h3>
                            <ul class="p-2 text-sm sm:text-base font-semibold">
                                <li class="ml-2">E-mail: <span class="font-medium">utsavwagle508@gmail.com</span></li>
                                <li class="ml-2">Phone: <span class="font-medium">+977 9869896545</span></li>
                                <li class="ml-2">Address: <span class="font-medium">Bharatpur-11, U-TEC Chowk, Bharatpur 44200</span></li>
                            </ul>
                        </div>
                    </div>';
        } else {
            // If there is an error with the query, display the error message
            $alert = '<div class="alert-error">
                        <span>Error: ' . $conn->error . '</span>
                      </div>';
        }

        // Close the database connection
        $conn->close();
    } catch (Exception $e) {
        $alert = '<div class="alert-error">
                    <span>' . $e->getMessage() . '</span>
                  </div>';
    }
}
?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Gymnasium Management System</title>

    <!-- LINK SECTION  -->

    <!-- FAVICON LINK  -->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="../assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="../assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/logo/logo (1).png">
    <!-- FAVICON LINK END -->


    <!-- CDN AND CSS LINK  -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style/try.css">
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





    <!-- REGISTRATION CONTAINER  -->
    <div class="registration-container bg-gray-300 ">
        <div class=" flex justify-center items-start p-10  md:h-[130vh] ">
            <div class=" w-full max-w-5xl  md:bg-white md:p-8 rounded-md md:shadow-md">
                <?php echo $alert; ?>

                <div class="text-2xl font-semibold mb-4">Registration</div>
                <div class="content">
                    <!-- REGISTRATION FORM  -->
                    <form action=" " method="POST">
                        <div class="user-details flex flex-wrap justify-between mb-4">
                            <div class="input-box mb-3 w-full md:w-1/2">
                                <span class="text-sm md:text-lg font-medium">Full Name</span>
                                <input type="text" name="full-name" placeholder="Enter your name" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" />
                            </div>
                            <div class="input-box mb-3 w-full md:w-1/2">
                                <span class="text-sm md:text-lg font-medium">Date of Birth</span>
                                <input type="date" name="dob" placeholder="Enter your age" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" onchange="calculateAge(this.value)" />
                            </div>
                            <div class="input-box mb-3 w-full md:w-1/2">
                                <span class="text-sm md:text-lg font-medium">Phone Number</span>
                                <input type="tel" name="phone-number" placeholder="Enter your phone number" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" />
                            </div>
                            <div class="input-box mb-3 w-full md:w-1/2">
                                <span class="text-sm md:text-lg font-medium">Address</span>
                                <input type="text" name="address" placeholder="Enter your address" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" />
                            </div>
                            <div class="input-box mb-3 w-full md:w-1/2">
                                <span class="text-sm md:text-lg font-medium">Email</span>
                                <input type="email" name="email" placeholder="Enter your email" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" />
                            </div>
                            <div class="input-box mb-3 w-full md:w-1/2">
                                <span class="text-sm md:text-lg font-medium">Membership Plan</span>
                                <select name="membership-plan" required class="w-full px-3 py-2.5 placeholder-gray-500 border border-gray-300 rounded">
                                    <option value="" disabled selected>Select your membership plan</option>
                                    <option value="Platinum">Platinum</option>
                                    <option value="Golden">Golden</option>
                                    <option value="Silver">Silver</option>
                                </select>
                            </div>
                        </div>
                        <div class="gender-details flex items-center justify-start mb-4">
                            <span class="text-sm md:text-lg font-medium mr-2">Gender</span>
                            <div class="category flex">
                                <label for="male" class="flex items-center cursor-pointer mr-4">
                                    <input type="radio" name="gender" value="Male" id="male" class="mr-1" required>
                                    <span class="gender">Male</span>
                                </label>
                                <label for="female" class="flex items-center cursor-pointer mr-4">
                                    <input type="radio" name="gender" value="Female" id="female" class="mr-1" required>
                                    <span class="gender">Female</span>
                                </label>
                            </div>
                        </div>
                        <div class="input-box mb-3 w-full md:w-1/2">
                            <span class="text-sm md:text-lg font-medium"></span>
                            <input type="hidden" name="age" placeholder="Enter your age" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" readonly />
                        </div>
                        <div class="button">
                            <input type="submit" name="submit" value="Register" class="h-10 w-full rounded text-black text-lg font-semibold bg-gray-200 hover:bg-black hover:text-white cursor-pointer">
                        </div>
                    </form>
                    <!-- REGISTRATION FORM END  -->

                </div>
            </div>
        </div>

    </div>
    <!-- REGISTRATION CONTAINER END -->





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
            copyright&copy; all rights reserved,<a href="https://github.com/Hunter109" target="_blank">Gymnasium Management System
            </a>
        </div>
        <!-- COPYRIGHT END -->

    </footer>

    <!-- FOOTER CONTAINER END  -->


    <!-- JAVASCRIPT LINK SECTION -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="../assets/javascript/navbar.js"></script>
    <script type="text/javascript">
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <script>
        function calculateAge(dateOfBirth) {
            const dob = new Date(dateOfBirth);
            const today = new Date();
            const age = today.getFullYear() - dob.getFullYear();
            document.getElementsByName("age")[0].value = age;
        }
    </script>




</body>

</html>