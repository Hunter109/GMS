<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact US | Gymnasium Management System</title>

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
    <link rel="stylesheet" href="./assets/style/contactUs.css">
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

    <!-- CONTACT US CONTAINER  -->
    <div class="contact-container">
        <!-- IMAGE WITH TEXT  -->
        <div class="contact-us">
            <div class="join-membership pt-[50%] ml-4 sm:pt-[25%] sm:ml-10 lg:pt-[20%] lg:ml-16" data-aos="fade-down-right">
                <h2 class=" py-2 text-xl  sm:text-2xl lg:text-6xl tracking-tight font-extrabold text-white text-left">
                    CONTACT <span class="text-red-700">US</span></h2>
                <p class=" py-2 max-w-xs sm:max-w-sm  lg:max-w-md text-white  text-sm sm:text-lg">

                    Whether you want to join the Gymnasium, undergo personal or group training, or just need advice,
                    we’re ready to help you.
                </p>
            </div>
        </div>
        <!-- IMAGE WITH TEXT  END -->



        <!-- OPENING HOUR AND GET IN TOUCH  -->

        <div class="flex flex-col  justify-evenly items-center  lg:flex-row">
            <!-- GET IN TOUCH -->
            <div class=" py-1 m-4  rounded-lg  bg-gray-50 h-1/3 lg:h-64 ">
                <h2 class=" text-center text-xl  sm:text-2xl lg:text-4xl m-4 tracking-tight font-extrabold text-red-700">
                    Get In<span class="text-black"> Touch</span></h2>
                <p class="p-3 text-sm sm:text-base">We’re on standby 6 days a week to help guide you and provide fitness
                    related advice. Simply contact us in person or by phone, email, or fill in the contact form below.
                <ul class="p-2 text-sm sm:text-base font-semibold">
                    <li class="  ml-2">E-mail: <span class="font-medium">utsavwagle508@gmail.com </span>
                    </li>
                    <li class=" ml-2"> Phone: <span class="font-medium">+977 9869896545 </span>

                    </li>
                    <li class=" ml-2"> Address: <span class="font-medium">Bharatpur-11, U-TEC Chowk, Bharatpur 44200
                        </span>
                    </li>
                </ul>
                </p>

            </div>
            <!-- GET IN TOUCH  END-->

            <!-- OPEN HOURS  -->
            <div class="open-hour py-1 m-4  rounded-lg  bg-gray-50 h-1/3  lg:h-64">
                <h2 class=" text-center text-xl  sm:text-2xl lg:text-4xl m-4 tracking-tight font-extrabold text-red-700">
                    OPEN <span class="text-black">HOURS</span></h2>
                <p class="p-3 text-sm sm:text-base">If you feel tired and stressed after a working day, we are happy to
                    give you an enjoyable
                    and healthy
                    solution to find your balance again.</p>

                <ul class="p-3 font-semibold">
                    <li class="list-disc ml-2">Sun-Fri: 5:00 AM - 9:00 PM</li>
                    <li class="list-disc ml-2"> Saturday: Closed
                    </li>
                </ul>

            </div>
            <!-- OPEN HOURS END  -->

        </div>
        <!-- OPENING HOUR AND GET IN TOUCH END  -->



        <!-- IMAGE WITH TEXT  -->
        <div class="my-1  bg-black ">
            <div class="contact-member flex flex-col items-center justify-center ">
                <h2 class="  py-12 text-xl  sm:text-2xl  md:text-4xl lg:text-5xl tracking-tight font-bold text-white text-center">
                    Get fit, stay motivated, and transform your life.

                </h2>
                <button type="button" onclick="window.location.href = './registration/registration.php';" class=" ml-2 mt-2  bg-red-700 hover:bg-red-800  font-medium rounded-full text-sm px-10 py-3 text-center text-white  ">Get
                    Fit With Us
                </button>

            </div>
        </div>
        <!-- IMAGE WITH TEXT END -->


    </div>
    <!-- CONTACT US CONTAINER END  -->





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
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="./assets/javascript/navbar.js"></script>
    <!--  JAVASCRIPT LINK SECTION END -->

</body>

</html>